<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReclamosSugerencias extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $datos;

    public function __construct($request)
    {
        $this->datos = $request;



    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this
                    ->view('Frontend.mail.reclamosSugerencias')
                    ->with(['datos'=>$this->datos])
                    ->subject('Reclamos o sugerencias');
    }
}
