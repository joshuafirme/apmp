<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Utils;

class SubscriptionController extends Controller
{
    public function index() {
        $subscribers = Subscription::paginate(10);
        $page_title = "Users | Pamilya Muna Party List";
        return view('admin.subscriber.index', compact('page_title', 'subscribers'));
    }

    public function sendMail() {
  
        $email = request()->email;

        if ($email) {
            if (Utils::isEmailExists($email)) {
                return redirect()->back()->with('danger', 'Email is already exists.');
            }
            $mail_type = 'confirm_subscription';
            Utils::sendMail($email, $mail_type);
    
            return redirect()->back()->with('success', 'We sent an confimation to your email.');
        }
        return redirect()->back()->with('danger', 'Please enter your email.');
    }

    public function confirmSubscription() {

        $key = request()->key;

        $s = new Subscription;
        
        if ($s->validateSubscription($key)) {
            $type = 'text-success';
            if ($s->isSubscribed($key)) {
                $message = "It looks like you've already confirmed your subscription. No further action is required.";
                
                return view('subscription-confirm', compact('message', 'type'));
            }
            
            Subscription::where('key', $key)->update([ 'status' => 1 ]);
            $message = "Subscription was success";
            return view('subscription-confirm', compact('message', 'type'));
        }
        $type = 'text-danger';
        $message = "Subscription key is invalid.";
        return view('subscription-confirm', compact('message', 'type'));
    }

}
