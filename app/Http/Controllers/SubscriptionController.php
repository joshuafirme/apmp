<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\GeneralSetting;
use Utils;
use Cache;

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
                return response()->json([
                    'status' =>  'email_exists'
                ], 200);
            }
            $mail_type = 'confirm_subscription';
            
            if (Utils::sendMail($email, $subject = null, $message = null, $mail_type)) {
                return response()->json([
                    'status' =>  'success'
                ], 200);
            }
    
        }
        return response()->json([
            'status' =>  'error'
        ], 200);
    }

    public function confirmSubscription(GeneralSetting $setting) {

        $key = request()->key;

        $page_title = "Privacy Policy | " . $setting::getAppName();

        $contact = json_decode(Cache::get('contact_and_footer_cache'));

        $s = new Subscription;
        
        if ($s->validateSubscription($key)) {
            $type = 'text-success';
            if ($s->isSubscribed($key)) {
                $message = "It looks like you've already confirmed your subscription. No further action is required.";
                
                return view('subscription-confirm', compact('page_title','message', 'type'));
            }
            
            Subscription::where('key', $key)->update([ 'status' => 1 ]);
            $message = "Subscription was success";
            return view('subscription-confirm', compact('page_title','message', 'type'));
        }
        $type = 'text-danger';
        $message = "Subscription key is invalid.";


        return view('subscription-confirm', compact('page_title', 'contact', 'message', 'type'));
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

    function exportCSV() {
        $data = Subscription::select('email', 'status', 'created_at')->get();
        return Utils::CSVExporter($data, 'subscribers');  
    }

}
