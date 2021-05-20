<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;

class acesso_autorizado_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url,$email)
    {
        $this->url = $url;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $to = [$this->email];

        $subject = 'Acesso autorizado ao arquivo requisitado - Biblioteca da FFLCH USP';

        return $this->view('emails.acesso_autorizado')
                    ->to($to)
                    ->subject($subject)
                    ->from(config('mail.from.address'))
                    ->replyTo(config('mail.reply_to.address'))
                    ->with([
                        'url' => $this->url,
                    ]);
    }
}
