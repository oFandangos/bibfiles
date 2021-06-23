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
    public function __construct($pedido)
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

        $to = explode(',',env('MAIL_AUTORIZADOR'));
        $to[] =  $this->pedido->email;
        $subject = 'Novo pedido de acesso - Biblioteca da FFLCH USP';

        return $this->view('emails.pedido_autorizacao')
                    ->to($to)
                    ->subject($subject)
                    ->from(config('mail.from.address'))
                    ->replyTo(config('mail.reply_to.address'))
                    ->with([
                        'pedido' => $this->pedido,
                    ]);
    }
}
