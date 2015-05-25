<?php namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

class UserMailer extends Mailer
{
    public function emailConfirmation($user)
    {
        if(isset($user)) {
            $data = [
                'user_id'           => $user->id,
                'user_name'         => $user->name,
                'confirmation_code' => $user->confirmation_code
            ];
            return $this->sendTo($user->email, 'Welcome to Carmazic.com', 'emails.signup', $data);
        } else {
            return false;
        }
    }
}
