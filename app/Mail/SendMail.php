<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    // 下記を追記する
    public $inquiry_content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // 下記を修正する
    public function __construct($inquiry_content)
    {
        // 下記を追記する
        $this->inquiry_content = $inquiry_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // 下記を追記する
        return $this
            //メールの件名
            ->subject('inquiry mail')
            //メールとして表示したいビューファイル
            ->view('mails.inquiry_mail')
            ->with([
                'inquiry_content' => $this->inquiry_content,
            ]);
        // 上記までを追記する
    }
}
