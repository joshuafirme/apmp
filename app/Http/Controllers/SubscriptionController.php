<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Mailer;

class SubscriptionController extends Controller
{
    public function sendMail() {
        
        $email = request()->email;

        if ($email) {
            $subject = "test subject";
            $html = "test";

            Mail::to($email)->send(new Mailer($subject, $html));
    
            return json_encode(array("response" => "email_sent"));
        }
        return json_encode(array("response" => "email_required"));
    }
}
