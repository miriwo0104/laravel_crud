<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestSendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $infos;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infos)
    {
        $this->infos = $infos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //下記を追記
        return $this
            //メールの件名
            ->subject('Test Mail')
            //メールとして表示したいビューファイル
            ->view('mails.test')
            ->with([
                'infos' => $this->infos,
            ]);
    }
}
