<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteNewUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $prospect;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($prospect)
    {
        $this->prospect = $prospect;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/register?hash='.$this->prospect->hash);
        return $this->subject('Invitation')
                    ->markdown('mail.invite_new_user', ['prospect'=>$this->prospect, 'url'=>$url]);
    }
}
