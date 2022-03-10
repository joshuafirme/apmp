<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Utils;
use App\Models\GeneralSetting;

class ContactUsController extends Controller
{
    public function sendMail() {
        $subject = request()->subject;
        $message = "Name: " . request()->name ."<br>" .
                   "Email: " . request()->email ."<br>" . 
                   "Message: " . request()->message;
        $to_email = 'joshuafirme1@gmail.com';//GeneralSetting::getEmail();
        
        if (Utils::sendMail($to_email, $subject, $message, 'contact_us')) {
            return response()->json([
                'status' =>  'success'
            ], 200);
        }

        return response()->json([
            'status' =>  'error'
        ], 200);
    }
}
