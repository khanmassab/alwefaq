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
            $cart =  \App\Models\Cart::Where('user_id',$user_id)->where('status',0)->get();
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
      public static function getRemain($id,$total)
      {
            $whereData = array(array('type','ashom') , array('item_id',$id));
            $count =  \App\Models\OrderItem::where($whereData)->join('orders','order_items.order_id','=','orders.id')->select('order_items.*','orders.status')->where('orders.status',1)->sum('order_items.quantity');
            $remain = $total - $count;
            return $remain;
      }

      public static function getIdNumber($id,$age,$date)
      {
             $year = date('Y', strtotime($date));
                      $age = floor((time() - strtotime($age)) / 31556926);

             return $id.$age.$year;
      }
      public static function getAge($date)
      {
            $age = floor((time() - strtotime($date)) / 31556926);

             return $age;
      }
      
        public static function sendSMS($mobileNumber,$messageContent)
        {
        $user = "966564292025";
        $password = "20252025a";
        $sendername = "Alwefaq";
        $text = urlencode( $messageContent);
        $to = $mobileNumber;
        // auth call
        
        $url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=full";
        
        //لارجاع القيمه json
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=json";
        // لارجاع القيمه xml
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E&return=xml";
        // لارجاع القيمه string 
        //$url = "http://www.4jawaly.net/api/sendsms.php?username=$user&password=$password&numbers=$to&message=$text&sender=$sendername&unicode=E";
        // Call API and get return message
        //fopen($url,"r");
        
        $ret = file_get_contents($url);
        //echo nl2br($ret);
        }
      
      
      public static function getRequestStatus($id)
      {
             switch($id)
             {
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

             return $id.$age.$year;
      }

     public static function instance()
     {
         return new AppHelper();
     }
}
