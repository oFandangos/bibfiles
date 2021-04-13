<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;

class pedido_autorizacao_mail extends Mailable
{
    use Queueable, SerializesModels;
    private $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $to = [$this->pedido->email,config('mail.autorizador.address')];

        $subject = 'Novo pedido de acesso - Biblioteca da FFLCH USP';

        return $this->view('emails.pedido_autorizacao')
                    ->to($to)
                    ->subject($subject)
                    ->with([
                        'pedido' => $this->pedido,
                    ]);
    }
}
