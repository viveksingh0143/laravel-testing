<?php namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

class FormMailer extends Mailer
{
    public function contactUsThanksMail($formRequest)
    {
        if(isset($formRequest) && !empty($formRequest['email'])) {
            unset($formRequest['_token']);
            $email = $formRequest['email'];
            return $this->sendTo($email, "Thank you for contacting us: Carmazic.com", 'emails.contact_thanks', $formRequest);
        } else {
            return false;
        }
    }

    public function contactUsQuery($formRequest)
    {
        if(isset($formRequest)) {
            unset($formRequest['_token']);
            $email = env('MAIL_TO_ADMIN', 'vickysingh0143@gmail.com');
            $data  = ['data' => $formRequest];
            return $this->sendTo($email, 'Query from user :Carmazic.com', 'emails.contact_query', $data);
        } else {
            return false;
        }
    }
}
