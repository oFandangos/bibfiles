<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;

class acesso_negado_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    private $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$pedido)
    {
        $this->email = $email;
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $to = [$this->email];

        $subject = 'Acesso negado ao arquivo requisitado - Biblioteca da FFLCH USP';

        return $this->view('emails.acesso_negado')
                    ->to($to)
                    ->subject($subject)
                    ->from(config('mail.from.address'))
                    ->replyTo(config('mail.reply_to.address'))
                    ->with([
                        'pedido' => $this->pedido,
                    ]);
    }
}
