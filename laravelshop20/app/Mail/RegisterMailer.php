<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->data['nd_email'];
        return $this->from(env('MAIL_FROM_ADDRESS', 'queanhst98@gmail.com'), env('MAIL_FROM_NAME', 'Houzie'))
            ->replyTo($email)
            ->subject("Có thành viên $email vừa đăng ký")
            ->view('emails.register-email')
            ->with('data', $this->data);
    }
}
