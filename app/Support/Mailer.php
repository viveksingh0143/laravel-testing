<?php namespace App\Support;

use Illuminate\Support\Facades\Mail;

class Mailer {
    public function sendTo($user, $subject, $view, $data = [], $mail_to_admin = false) {
        $user_email = $user->email;
        if($mail_to_admin) {
            $admin_mail = getenv('admin_mail', 'viveksingh0143@gmail.com');
            Mail::send($view, $data, function($message) use($admin_mail, $subject) {
                $message->to($admin_mail)->subject($subject);
            });
        }
        Mail::send($view, $data, function($message) use($user_email, $subject) {
            $message->to($user_email)->subject($subject);
        });
    }
}
