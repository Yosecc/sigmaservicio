<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verificación de certificado - Sigma Servicio</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    body { background: #f2f4f7; color: #263238; }
    .verify-wrap { min-height: 100vh; display: flex; align-items: center; padding: 30px 15px; }
    .verify-card { max-width: 780px; margin: auto; background: #fff; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,.12); overflow: hidden; }
    .verify-head { background: #6b7075; color: #fff; padding: 28px; text-align: center; }
    .verify-head img { max-height: 78px; max-width: 240px; margin-bottom: 15px; }
    .verify-body { padding: 32px; }
    .result { border-radius: 8px; padding: 18px; margin-bottom: 25px; text-align: center; }
    .result-valid { background: #e8f5e9; color: #1b5e20; border: 1px solid #a5d6a7; }
    .result-invalid { background: #ffebee; color: #b71c1c; border: 1px solid #ef9a9a; }
    .result-expired { background: #fff8e1; color: #8d6e00; border: 1px solid #ffe082; }
    .data-row { padding: 12px 0; border-bottom: 1px solid #eceff1; }
    .data-label { color: #607d8b; font-size: 13px; text-transform: uppercase; letter-spacing: .4px; }
    .data-value { font-size: 17px; font-weight: 600; overflow-wrap: anywhere; }
  </style>
</head>
<body>
  <div class="verify-wrap">
    <main class="verify-card w-100">
      <header class="verify-head">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="Sigma Servicio">
        <h2 class="mb-1">Verificación de certificado</h2>
        <p class="mb-0">Consulta pública de autenticidad</p>
      </header>

      <section class="verify-body">
        @if(!$certificado)
          <div class="result result-invalid">
            <h3>Certificado no válido</h3>
            <p class="mb-0">El código consultado no corresponde a un certificado registrado.</p>
          </div>
        @else
          @if($certificado->estado_actual === 'vigente')
            <div class="result result-valid">
              <h3>Certificado auténtico y vigente</h3>
              <p class="mb-0">Este registro fue emitido y se encuentra validado por Sigma Servicio.</p>
            </div>
          @elseif($certificado->estado_actual === 'vencido')
            <div class="result result-expired">
              <h3>Certificado vencido</h3>
              <p class="mb-0">El certificado existe, pero ya no se encuentra vigente.</p>
            </div>
          @else
            <div class="result result-invalid">
              <h3>Certificado anulado</h3>
              <p class="mb-0">El registro existe, pero fue anulado y no debe considerarse válido.</p>
            </div>
          @endif

          <div class="row">
            <div class="col-md-6 data-row">
              <div class="data-label">Número de certificado</div>
              <div class="data-value">{{ $certificado->numero_certificado }}</div>
            </div>
            <div class="col-md-6 data-row">
              <div class="data-label">Estado</div>
              <div class="data-value">{{ $certificado->estado_texto }}</div>
            </div>
            @if($certificado->nombre_titular)
              <div class="col-md-6 data-row">
                <div class="data-label">Titular del certificado</div>
                <div class="data-value">{{ $certificado->nombre_titular }}</div>
              </div>
            @endif
            @if($certificado->documento_identidad)
              <div class="col-md-6 data-row">
                <div class="data-label">Documento de identidad</div>
                <div class="data-value">{{ $certificado->documento_identidad }}</div>
              </div>
            @endif
            @if($certificado->nombre_cliente)
              <div class="col-md-6 data-row">
                <div class="data-label">Nombre del cliente</div>
                <div class="data-value">{{ $certificado->nombre_cliente }}</div>
              </div>
            @endif
            @if($certificado->nombre_empresa)
              <div class="col-md-6 data-row">
                <div class="data-label">Nombre de la empresa</div>
                <div class="data-value">{{ $certificado->nombre_empresa }}</div>
              </div>
            @endif
            @if($certificado->nombre_certificacion)
              <div class="col-md-12 data-row">
                <div class="data-label">Certificación</div>
                <div class="data-value">{{ $certificado->nombre_certificacion }}</div>
              </div>
            @endif
            @if($certificado->domicilio)
              <div class="col-md-12 data-row">
                <div class="data-label">Domicilio</div>
                <div class="data-value">{{ $certificado->domicilio }}</div>
              </div>
            @endif
            @if($certificado->equipo_tipo)
              <div class="col-md-6 data-row">
                <div class="data-label">Tipo de equipo</div>
                <div class="data-value">{{ $certificado->equipo_tipo }}</div>
              </div>
            @endif
            @if($certificado->equipo_marca)
              <div class="col-md-6 data-row">
                <div class="data-label">Marca</div>
                <div class="data-value">{{ $certificado->equipo_marca }}</div>
              </div>
            @endif
            @if($certificado->equipo_modelo)
              <div class="col-md-6 data-row">
                <div class="data-label">Modelo</div>
                <div class="data-value">{{ $certificado->equipo_modelo }}</div>
              </div>
            @endif
            @if($certificado->equipo_serial)
              <div class="col-md-6 data-row">
                <div class="data-label">Serial</div>
                <div class="data-value">{{ $certificado->equipo_serial }}</div>
              </div>
            @endif
            @if($certificado->codigo_interno)
              <div class="col-md-6 data-row">
                <div class="data-label">Código interno</div>
                <div class="data-value">{{ $certificado->codigo_interno }}</div>
              </div>
            @endif
            @if($certificado->capacidad_certificada)
              <div class="col-md-6 data-row">
                <div class="data-label">Capacidad certificada</div>
                <div class="data-value">{{ $certificado->capacidad_certificada }}</div>
              </div>
            @endif
            @if($certificado->normas_aplicadas)
              <div class="col-md-12 data-row">
                <div class="data-label">Normas aplicadas</div>
                <div class="data-value">{{ $certificado->normas_aplicadas }}</div>
              </div>
            @endif
            @if($certificado->lugar_inspeccion)
              <div class="col-md-12 data-row">
                <div class="data-label">Lugar de inspección</div>
                <div class="data-value">{{ $certificado->lugar_inspeccion }}</div>
              </div>
            @endif
            <div class="col-md-3 data-row">
              <div class="data-label">Fecha de certificación</div>
              <div class="data-value">{{ $certificado->fecha_emision->format('d/m/Y') }}</div>
            </div>
            <div class="col-md-3 data-row">
              <div class="data-label">Vencimiento de la certificación</div>
              <div class="data-value">{{ $certificado->fecha_vencimiento ? $certificado->fecha_vencimiento->format('d/m/Y') : 'No aplica' }}</div>
            </div>
          </div>
        @endif

        <p class="text-center text-muted mt-4 mb-0">
          Consulta realizada el {{ date('d/m/Y H:i') }}
        </p>
      </section>
    </main>
  </div>
</body>
</html>
