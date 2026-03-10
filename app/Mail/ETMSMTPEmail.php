<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ETMSMTPEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // echo "hi";
        // print_r($this->details);
        // return $this->from("dineshkumar8653@gmail.com")->subject("POS")->view('email');

        // $bccEmail = "info@vonit.in";

        if($this->details['mail_type'] == 'password-reset'){
            return $this->subject($this->details['subject'])->view("frontend.mail.reset-password");

        }else if($this->details["mail_type"] == "order-confirm"){
        return $this->subject($this->details['subject'])->view("frontend.mail.order_confirm");
        }else{
            return $this->subject($this->details['subject'])->view("frontend.mail.registration");
        }
    }
}
