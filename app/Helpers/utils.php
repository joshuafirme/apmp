<?php
namespace App\Helpers;
use DateTime;
use Cache;
use Auth;
use Mail;
use App\Mail\Mailer;
use App\Models\User;
use App\Models\Subscription;
class Utils
{
    public static function sendMail($email, $subject = "", $message = "", $mail_type = "") {
        
        if ($mail_type == 'confirm_subscription') {

            $key = self::getToken(100);
            $confirmation_link = url('/subscription/confirm?key=' . $key);

            Subscription::create([
                'email' => $email,
                'key' => $key,
                'status' => 0
            ]);
            
            $subject = "Confirm your subscription for Ang Pamilya Muna - Party List";
            $message = Utils::confirmSubscriptionTemplate($confirmation_link);
        }
        Mail::to($email)->send(new Mailer($subject, $message));
    }

    public static function confirmSubscriptionTemplate($confirmation_link) {
     
        return "<p>Hi there,</p>
        <p>Please confirm your subscription for the Ang Pamilya Muna - Party List.</p>
        <!-- Action -->
        <a href='{$confirmation_link}' class='button button--green' target='_blank'>Click here to confirm your subscription!</a> <br><br>
        <p>If you received this email by mistake, simply delete it. You won't be subscribed if you don't click the confirmation link above.</p>
        <p>Thanks,
        <br>Ang Pamilya Muna - Party List</p>
        ";
    }

    public static function isEmailExists($email) {
        $res = Subscription::where('email', $email)->value('email');
        return isset($res) && $res ? true : false;
    }

    public static function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public static function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[self::crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }

    static function timeAgo($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function abbreviateMonthNumber($month_number) {
        switch ($month_number) {
        case 1:
            return "JAN";
            break;
        case 2:
            return "FEB";
            break;
        case 3:
            return "MAR";
            break;
        case 4:
            return "APR";
            break;
        case 5:
            return "MAY";
            break;
        case 6:
            return "JUN";
            break;
        case 7:
            return "JUL";
            break;               
        case 8:
            return "AUG";
             break;                
        case 9:
            return "SEP";
            break;
        case 10:
            return "OCT";
            break;
         case 11:
            return "NOV";
            break;
        case 12:
            return "DEC";
            break;
        }
    }
}
?>
