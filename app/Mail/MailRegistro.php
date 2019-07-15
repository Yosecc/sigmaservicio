<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Solicitudes;
use App\Paises;
use App\Tours;

class MailRegistro extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $solicitud = Solicitudes::join('paises', 'solicitudes.pais','=','paises.iso')
                                ->join('tours','solicitudes.id_tour', '=', 'tours.id')
                                ->select('solicitudes.*','tours.nombre as tour', 'paises.nombre as pais')
                                ->where('solicitudes.email', $request->email)
                                ->where('solicitudes.id_tour',$request->id)
                                ->first();

        return $this->from('info@lariojaautentica.com')
                    ->cc('yosec.cervino@gmail.com')
                    ->view('Frontend.Mail.MailRegistro')
                    ->with([
                            'solicitud' => $solicitud,
                      ])
                    ->subject('Solicitud de Reserva');
    }
}
