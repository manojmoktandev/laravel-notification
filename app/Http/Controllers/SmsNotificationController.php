<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SmsNotification;
use App\Models\User;

class SmsNotificationController extends Controller
{
    //
    public function __construct(){

    }
    public function sendSmsNotification(){
      $user = User::find(1);
      $user->notify(new SmsNotification);
      return back()->with('success','SMS Notification send to '.$user['phone_number'] .'successfully!');
    }
    // public function sendSmsNotification(){
    //     $basic  = new \Vonage\Client\Credentials\Basic("0d441845", "em6qxkH1ZABTQe1f");
    //     $client = new \Vonage\Client($basic);
    //     $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("12013511943", 'BRAND_NAME', 'A text message sent using the Nexmo SMS API')
    //     );

    //     $message = $response->current();
    //     if ($message->getStatus() == 0) {
    //         echo "The message was sent successfully\n";
    //     } else {
    //         echo "The message failed with status: " . $message->getStatus() . "\n";
    //     }
    // }
}
