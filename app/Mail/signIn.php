<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class signIn extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     **/
    protected $user = null;

    /**
     * @var string
     **/
    protected $url = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.signIn')
                    ->from('auto.mailer@wjaag.com', 'Login LitDesk')
                    ->to($this->user->email)
                    ->with(['url' => $this->url]);
    }
}