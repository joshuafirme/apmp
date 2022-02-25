<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\GeneralSetting;
use Utils;

class SubscriptionController extends Controller
{
    public function index(GeneralSetting $setting) {
        $subscribers = Subscription::paginate(10);
        $page_title = "Subscribers | " . $setting::getAppName();
        return view('admin.subscriber.index', compact('page_title', 'subscribers'));
    }

    public function search(GeneralSetting $setting)
    {
        $key = isset(request()->key) ? request()->key : "";
        $subscribers = Subscription::where('email', 'LIKE', '%' . $key . '%')->paginate(5);

        $page_title = "Subscribers | " . $setting::getAppName();
        return view('admin.subscriber.index', compact('page_title', 'subscribers'));
    }

    public function sendBulkMail() {
  
        $subscribers = Subscription::select('email', 'status')->where('status', 1)->get();
        $subject = request()->subject;
        $message = request()->message;
        $sent_count = 0;
        try {
            if (count($subscribers) && $subject && $message) {

                foreach ($subscribers as $key => $item) {
                    $res = Utils::sendMail($item->email, $subject, $message);
                    $sent_count++;
                }
                return response()->json(['status' =>  'success', 'sent_count' => $sent_count, 'out_of' => count($subscribers)], 200);
                    
            }
        } catch (\Throwable $th) {
            return response()->json(['status' =>  'success', 'sent_count' => $sent_count, 'out_of' => count($subscribers)], 200);
        }
    }

    public function sendMail() {
  
        $email = request()->email;

        if ($email) {
            if (Utils::isEmailExists($email)) {
                return redirect()->back()->with('danger', 'Email is already exists.');
            }
            $mail_type = 'confirm_subscription';
            
            Utils::sendMail($email, $subject = null, $message = null, $mail_type);
    
            return redirect()->back()->with('success', 'Thank you, your subscription request was successful! Please check your email inbox to confirm.');
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

    public function destroy(Subscription $subscriber)
    {
        if ($subscriber->delete()) {
            return response()->json([
                'status' =>  'success',
                'message' => 'Data was deleted.'
            ], 200);
        }

        return response()->json([
            'status' =>  'error',
            'message' => 'Deleting data failed.'
        ], 200);
    }

}
