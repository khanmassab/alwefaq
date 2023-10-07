<?php

namespace App\Helpers;

use App\Repository\CartRepositoryInterface;
use App\Repository\OrderItemsRepositoryInterface;


class AppHelper
{
    private $cartRepository;

    public static function cart()
    {
        $user_id = auth('user')->user()->id ?? null;
        $cart =  \App\Models\Cart::Where('user_id', $user_id)->where('status', 0)->get();
        return $cart;
        //          $whereData = array(array('user_id',$user_id) , array('status',0));
        //
        //          $cartItems = [];
        //          foreach (\App\Models\Cart::where($whereData)->orderBy('id', 'desc')->get() as $cart) {
        //              if ((empty($cart->sadakat)  || empty($cart->ashom)) && $cart->type != 'zakah')
        //                  \App\Models\Cart::find($cart->id)->delete();
        //              else
        //                  $cartItems[] = $cart;
        //
        //          }
        //
        //          return $cartItems;
    }
    public static function getRemain($id, $total)
    {
        $whereData = array(array('type', 'ashom'), array('item_id', $id));
        $count =  \App\Models\OrderItem::where($whereData)->join('orders', 'order_items.order_id', '=', 'orders.id')->select('order_items.*', 'orders.status')->where('orders.status', 1)->sum('order_items.quantity');
        $remain = $total - $count;
        return $remain;
    }

    public static function getIdNumber($id, $age, $date)
    {
        $year = date('Y', strtotime($date));
        $age = floor((time() - strtotime($age)) / 31556926);

        return $id . $age . $year;
    }
    public static function getAge($date)
    {
        $age = floor((time() - strtotime($date)) / 31556926);

        return $age;
    }

    public static function sendSMS($mobileNumber, $messageContent)
    {

        $app_id = "h76nDxlXyMTDvE74bVjZzXHdylAcuXv4W2vaxxy4";
        $app_sec = "jRMfWCxsDFwJOqsNhvkiJRG3ULu3l0FEdhLP3SkMHqbcc7BTXfJv4ZSMnH1L4Po0oGQ9HiOzk26O5R2KzFy6PwFx92EVa6cT8hcR";
        $app_hash = base64_encode("{$app_id}:{$app_sec}");

        $to = array($mobileNumber);
        $messages = [
            "messages" => [
                [
                    "text" => $messageContent,
                    "numbers" => $to,
                    "sender" => "Alwefaq"
                ]
            ]
        ];

        $url = "https://api-sms.4jawaly.com/api/v1/account/area/sms/send";
        $headers = [
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Basic {$app_hash}"
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($messages));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $ret = json_decode($response, true);



        // OLD API
        // $user = "966564292025";
        // $password = "20252025a";
        // $sendername = "Alwefaq";
        // $text = urlencode($messageContent);
        // $to = $mobileNumber;
        // // auth call

        // $url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=full";

        //لارجاع القيمه json
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";
        // لارجاع القيمه xml
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=xml";
        // لارجاع القيمه string 
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E";
        // Call API and get return message
        //fopen($url,"r");

        // $ret = file_get_contents($url);

        //echo nl2br($ret);
    }


    public static function getRequestStatus($id)
    {
        switch ($id) {
            case '0':
                return 'waiting';
                break;

            case '1':
                return 'Possible Candidete';
                break;

            case '2':
                return 'success';

            case '2':
                return 'failed';

            default:
                return 'No Status';
        }

        return $id . $age . $year;
    }

    public static function instance()
    {
        return new AppHelper();
    }
}
