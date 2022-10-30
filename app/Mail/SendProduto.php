<?php

namespace App\Mail;

use App\Models\Produto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendProduto extends Mailable
{
    use Queueable, SerializesModels;

    public $produto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Produto $prod)
    {
        $this->produto = $prod;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send.produto' , [
            'produto nome' => $this->produto['nome'],
            'mensagem' => $this->produto['mensagem']
        ]);
    }
}
