<?php

namespace App\Http\Controllers\Backend;

use App\Certificado;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificadoController extends Controller
{
    public function index(Request $request)
    {
        $certificados = Certificado::with('creador:id,name')
            ->when($request->q, function ($query) use ($request) {
                $busqueda = $request->q;

                return $query->where(function ($subquery) use ($busqueda) {
                    $subquery->where('numero_certificado', 'like', '%'.$busqueda.'%')
                        ->orWhere('nombre_titular', 'like', '%'.$busqueda.'%')
                        ->orWhere('nombre_cliente', 'like', '%'.$busqueda.'%')
                        ->orWhere('nombre_empresa', 'like', '%'.$busqueda.'%')
                        ->orWhere('documento_identidad', 'like', '%'.$busqueda.'%')
                        ->orWhere('nombre_certificacion', 'like', '%'.$busqueda.'%')
                        ->orWhere('equipo_serial', 'like', '%'.$busqueda.'%')
                        ->orWhere('codigo_interno', 'like', '%'.$busqueda.'%');
                });
            })
            ->when($request->estado, function ($query) use ($request) {
                if ($request->estado === 'vigente') {
                    return $query->where('estado', 'vigente')
                        ->where(function ($subquery) {
                            $subquery->whereNull('fecha_vencimiento')
                                ->orWhereDate('fecha_vencimiento', '>=', Carbon::today());
                        });
                }

                if ($request->estado === 'vencido') {
                    return $query->where(function ($subquery) {
                        $subquery->where('estado', 'vencido')
                            ->orWhere(function ($expiredQuery) {
                                $expiredQuery->where('estado', 'vigente')
                                    ->whereDate('fecha_vencimiento', '<', Carbon::today());
                            });
                    });
                }

                return $query->where('estado', 'anulado');
            })
            ->when($request->desde, function ($query) use ($request) {
                return $query->whereDate('fecha_emision', '>=', $request->desde);
            })
            ->when($request->hasta, function ($query) use ($request) {
                return $query->whereDate('fecha_emision', '<=', $request->hasta);
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('Backend.certificados.index', compact('certificados'));
    }

    public function create()
    {
        return view('Backend.certificados.create');
    }

    public function importarForm()
    {
        return view('Backend.certificados.importar');
    }

    public function plantillaCsv()
    {
        $columnas = $this->columnasCsv();
        $filas = [
            [
                'tipo_certificado' => 'persona',
                'numero_certificado' => 'PER-2026-001',
                'titular_certificado' => 'María González',
                'documento_identidad' => 'V-12345678',
                'nombre_cliente' => '',
                'nombre_empresa' => 'Empresa Ejemplo, C.A.',
                'certificacion' => 'Operación segura de equipos de izamiento',
                'domicilio' => '',
                'equipo_tipo' => '',
                'equipo_marca' => '',
                'equipo_modelo' => '',
                'equipo_serial' => '',
                'codigo_interno' => '',
                'capacidad_certificada' => '',
                'normas_aplicadas' => '',
                'lugar_inspeccion' => '',
                'fecha_certificacion' => '2026-06-24',
                'vencimiento_certificacion' => '2027-06-24',
                'estado' => 'vigente',
                'observaciones' => 'Ejemplo de certificado para persona',
            ],
            [
                'tipo_certificado' => 'empresa',
                'numero_certificado' => 'EMP-2026-001',
                'titular_certificado' => '',
                'documento_identidad' => '',
                'nombre_cliente' => 'Cliente Industrial',
                'nombre_empresa' => 'Empresa Ejemplo, C.A.',
                'certificacion' => '',
                'domicilio' => 'Av. Principal, Zona Industrial',
                'equipo_tipo' => 'Grúa móvil',
                'equipo_marca' => 'Liebherr',
                'equipo_modelo' => 'LTM 1100',
                'equipo_serial' => 'SER-001234',
                'codigo_interno' => 'EQ-0098',
                'capacidad_certificada' => '100 toneladas',
                'normas_aplicadas' => 'ASME B30.5',
                'lugar_inspeccion' => 'Planta principal',
                'fecha_certificacion' => '2026-06-24',
                'vencimiento_certificacion' => '2027-06-24',
                'estado' => 'vigente',
                'observaciones' => 'Ejemplo de certificado para empresa o equipo',
            ],
        ];

        $contenido = "\xEF\xBB\xBF";
        $archivo = fopen('php://temp', 'r+');
        fputcsv($archivo, $columnas, ';');
        foreach ($filas as $fila) {
            fputcsv($archivo, array_map(function ($columna) use ($fila) {
                return $fila[$columna];
            }, $columnas), ';');
        }
        rewind($archivo);
        $contenido .= stream_get_contents($archivo);
        fclose($archivo);

        return response($contenido, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="plantilla-certificados.csv"',
        ]);
    }

    public function importar(Request $request)
    {
        $request->validate([
            'archivo_csv' => 'required|file|max:5120',
        ]);

        if (strtolower($request->file('archivo_csv')->getClientOriginalExtension()) !== 'csv') {
            return back()->withErrors(['archivo_csv' => 'Debe seleccionar un archivo con extensión .csv.']);
        }

        $ruta = $request->file('archivo_csv')->getRealPath();
        $archivo = fopen($ruta, 'r');

        if (!$archivo) {
            return back()->withErrors(['archivo_csv' => 'No se pudo leer el archivo CSV.']);
        }

        $primeraLinea = fgets($archivo);
        rewind($archivo);
        $delimitador = substr_count($primeraLinea, ';') >= substr_count($primeraLinea, ',') ? ';' : ',';
        $encabezados = fgetcsv($archivo, 0, $delimitador);

        if (!$encabezados) {
            fclose($archivo);
            return back()->withErrors(['archivo_csv' => 'El archivo CSV está vacío.']);
        }

        $encabezados[0] = preg_replace('/^\xEF\xBB\xBF/', '', $encabezados[0]);
        $esperados = $this->columnasCsv();
        $esperadosLegacy = $this->columnasCsvLegacy();

        if ($encabezados !== $esperados && $encabezados !== $esperadosLegacy) {
            fclose($archivo);
            return back()->withErrors([
                'archivo_csv' => 'La estructura del archivo no coincide con la plantilla. Descargue y utilice la plantilla oficial.',
            ]);
        }

        $columnasArchivo = $encabezados;

        $registros = [];
        $errores = [];
        $linea = 1;
        $numerosArchivo = [];

        while (($fila = fgetcsv($archivo, 0, $delimitador)) !== false) {
            $linea++;

            if ($this->filaVacia($fila)) {
                continue;
            }

            $fila = array_pad($fila, count($columnasArchivo), '');
            $datos = array_combine($columnasArchivo, array_slice($fila, 0, count($columnasArchivo)));
            $datos = array_map(function ($valor) {
                $valor = trim($valor);
                return $valor === '' ? null : $valor;
            }, $datos);

            $datos['nombre_titular'] = $datos['titular_certificado'] ?? $datos['nombre_persona'] ?? null;
            $datos['nombre_certificacion'] = $datos['certificacion'] ?? $datos['curso'] ?? null;
            $datos['fecha_emision'] = $datos['fecha_certificacion'] ?? $datos['fecha_creacion'] ?? null;
            $datos['fecha_vencimiento'] = $datos['vencimiento_certificacion'] ?? $datos['fecha_vencimiento'] ?? null;
            unset($datos['titular_certificado'], $datos['nombre_persona'], $datos['certificacion'], $datos['curso'], $datos['fecha_certificacion'], $datos['fecha_creacion'], $datos['vencimiento_certificacion']);

            $datos['tipo_certificado'] = strtolower((string) $datos['tipo_certificado']);
            $datos['estado'] = strtolower((string) ($datos['estado'] ?: 'vigente'));
            $datos['fecha_emision'] = $this->normalizarFecha($datos['fecha_emision']);
            $datos['fecha_vencimiento'] = $this->normalizarFecha($datos['fecha_vencimiento']);

            $validador = Validator::make($datos, $this->reglasCertificado(), [
                'numero_certificado.unique' => 'El número de certificado ya existe.',
            ]);

            if (isset($numerosArchivo[$datos['numero_certificado']])) {
                $validador->after(function ($validator) {
                    $validator->errors()->add('numero_certificado', 'El número está repetido dentro del archivo.');
                });
            }

            if ($validador->fails()) {
                foreach ($validador->errors()->all() as $error) {
                    $errores[] = 'Fila '.$linea.': '.$error;
                }
                continue;
            }

            $numerosArchivo[$datos['numero_certificado']] = true;
            $registros[] = $this->prepararDatos($datos);
        }

        fclose($archivo);

        if (empty($registros) && empty($errores)) {
            return back()->withErrors(['archivo_csv' => 'El archivo no contiene registros para importar.']);
        }

        if (!empty($errores)) {
            return back()->withInput()->with('import_errors', $errores);
        }

        DB::transaction(function () use ($registros) {
            foreach ($registros as $datos) {
                $datos['token'] = $this->generarToken();
                $datos['creado_por'] = auth()->id();
                $datos['actualizado_por'] = auth()->id();
                Certificado::create($datos);
            }
        });

        return redirect()
            ->route('certificados.index')
            ->with('success', count($registros).' certificados importados correctamente.');
    }

    public function store(Request $request)
    {
        $datos = $this->prepararDatos($this->validar($request));
        $datos['token'] = $this->generarToken();
        $datos['creado_por'] = auth()->id();
        $datos['actualizado_por'] = auth()->id();

        $certificado = Certificado::create($datos);

        return redirect()
            ->route('certificados.show', $certificado->id)
            ->with('success', 'Certificado registrado correctamente.');
    }

    public function show($id)
    {
        $certificado = Certificado::with(['creador:id,name', 'actualizador:id,name'])
            ->findOrFail($id);

        return view('Backend.certificados.show', compact('certificado'));
    }

    public function edit($id)
    {
        $certificado = Certificado::findOrFail($id);

        return view('Backend.certificados.edit', compact('certificado'));
    }

    public function update(Request $request, $id)
    {
        $certificado = Certificado::findOrFail($id);
        $datos = $this->prepararDatos($this->validar($request, $certificado->id));
        $datos['actualizado_por'] = auth()->id();
        $certificado->update($datos);

        return redirect()
            ->route('certificados.show', $certificado->id)
            ->with('success', 'Certificado actualizado correctamente.');
    }

    public function destroy($id)
    {
        $certificado = Certificado::findOrFail($id);
        $certificado->actualizado_por = auth()->id();
        $certificado->save();
        $certificado->delete();

        return redirect()
            ->route('certificados.index')
            ->with('success', 'Certificado eliminado correctamente.');
    }

    public function qr($id)
    {
        $certificado = Certificado::findOrFail($id);
        $contenido = QrCode::format('png')
            ->size(600)
            ->margin(2)
            ->errorCorrection('H')
            ->generate(route('certificados.verificar', $certificado->token));

        $nombre = 'certificado-'.$this->nombreArchivo($certificado->numero_certificado).'-qr.png';

        return response($contenido, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="'.$nombre.'"',
            'Content-Length' => strlen($contenido),
        ]);
    }

    public function verificar($token)
    {
        $certificado = Certificado::where('token', $token)->first();

        return view('Frontend.certificados.verificar', compact('certificado'));
    }

    private function validar(Request $request, $id = null)
    {
        return $request->validate($this->reglasCertificado($id));
    }

    private function reglasCertificado($id = null)
    {
        return [
            'tipo_certificado' => 'required|in:persona,empresa',
            'numero_certificado' => 'required|string|max:100|unique:certificados,numero_certificado'.($id ? ','.$id : ''),
            'nombre_titular' => 'required_if:tipo_certificado,persona|nullable|string|max:255',
            'documento_identidad' => 'nullable|string|max:100',
            'nombre_certificacion' => 'required_if:tipo_certificado,persona|nullable|string|max:255',
            'nombre_cliente' => 'required_if:tipo_certificado,empresa|nullable|string|max:255',
            'nombre_empresa' => 'required|string|max:255',
            'domicilio' => 'nullable|string|max:1000',
            'equipo_tipo' => 'nullable|string|max:255',
            'equipo_marca' => 'nullable|string|max:255',
            'equipo_modelo' => 'nullable|string|max:255',
            'equipo_serial' => 'nullable|string|max:255',
            'codigo_interno' => 'nullable|string|max:255',
            'capacidad_certificada' => 'nullable|string|max:255',
            'normas_aplicadas' => 'nullable|string|max:2000',
            'lugar_inspeccion' => 'nullable|string|max:255',
            'institucion_emisora' => 'nullable|string|max:255',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'nullable|date|after_or_equal:fecha_emision',
            'estado' => 'required|in:vigente,vencido,anulado',
            'observaciones' => 'nullable|string|max:2000',
        ];
    }

    private function generarToken()
    {
        do {
            $token = Str::random(40);
        } while (Certificado::where('token', $token)->exists());

        return $token;
    }

    private function prepararDatos(array $datos)
    {
        if ($datos['tipo_certificado'] === 'persona') {
            foreach ([
                'nombre_cliente',
                'domicilio',
                'equipo_tipo',
                'equipo_marca',
                'equipo_modelo',
                'equipo_serial',
                'codigo_interno',
                'capacidad_certificada',
                'normas_aplicadas',
                'lugar_inspeccion',
            ] as $campo) {
                $datos[$campo] = null;
            }
        } else {
            $datos['nombre_titular'] = null;
            $datos['documento_identidad'] = null;
            $datos['nombre_certificacion'] = null;
        }

        return $datos;
    }

    private function nombreArchivo($texto)
    {
        $texto = preg_replace('/[^A-Za-z0-9_-]+/', '-', $texto);

        return trim($texto, '-');
    }

    private function columnasCsv()
    {
        return [
            'tipo_certificado',
            'numero_certificado',
            'titular_certificado',
            'documento_identidad',
            'nombre_cliente',
            'nombre_empresa',
            'certificacion',
            'domicilio',
            'equipo_tipo',
            'equipo_marca',
            'equipo_modelo',
            'equipo_serial',
            'codigo_interno',
            'capacidad_certificada',
            'normas_aplicadas',
            'lugar_inspeccion',
            'fecha_certificacion',
            'vencimiento_certificacion',
            'estado',
            'observaciones',
        ];
    }

    private function columnasCsvLegacy()
    {
        return [
            'tipo_certificado',
            'numero_certificado',
            'nombre_persona',
            'documento_identidad',
            'nombre_cliente',
            'nombre_empresa',
            'curso',
            'domicilio',
            'equipo_tipo',
            'equipo_marca',
            'equipo_modelo',
            'equipo_serial',
            'codigo_interno',
            'capacidad_certificada',
            'normas_aplicadas',
            'lugar_inspeccion',
            'fecha_creacion',
            'fecha_vencimiento',
            'estado',
            'observaciones',
        ];
    }

    private function normalizarFecha($fecha)
    {
        if (!$fecha) {
            return null;
        }

        foreach (['Y-m-d', 'd/m/Y', 'd-m-Y'] as $formato) {
            try {
                $valor = Carbon::createFromFormat($formato, $fecha);
                if ($valor && $valor->format($formato) === $fecha) {
                    return $valor->format('Y-m-d');
                }
            } catch (\Exception $e) {
                // Se validará como fecha inválida posteriormente.
            }
        }

        return $fecha;
    }

    private function filaVacia(array $fila)
    {
        foreach ($fila as $valor) {
            if (trim($valor) !== '') {
                return false;
            }
        }

        return true;
    }
}
