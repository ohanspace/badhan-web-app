<?php
namespace App\Accounts;


class SendConfirmationSMS
{
    /**
     * @var \ohanspace\sms\SMS
     */
    private $sms;

    /**
     * @param \Illuminate\Mail\Mailer $mailer
     */
    public function __construct(SMS $sms)
    {
        $this->sms = $sms;
    }

    /**
     * Send a confirmation sms to the user to verify his telephone
     *
     * @param \App\Accounts\User $user
     */
    public function send(User $user)
    {
        $this->sms->send('verify your phone', function($sms) use ($user){
            $sms->to($user->telephone);
        });

    }
}
