<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class cotizacionContacto extends Mailable
{
    use Queueable, SerializesModels;
    protected $nombres;
    protected $email;
    protected $telefono;
    protected $servicio;



    public function __construct($nombres,$email,$telefono,$servicio)
    {
        $this->nombres = $nombres;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->servicio = $servicio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $nombres= $this->nombres;
        $email= $this->email;
        $telefono= $this->telefono;
        $servicio= $this->servicio;

        return $this->from('enviolaravelmail@gmail.com')
                    ->view('Frontend.mail.cotizacionContacto')
                    ->with([
                            'nombres' => $nombres,
                            'email' => $email,
                            'telefono' => $telefono,
                            'servicio'=>$servicio,

                      ])
                    ->subject('Solicitud de Cotización');
    }
}
