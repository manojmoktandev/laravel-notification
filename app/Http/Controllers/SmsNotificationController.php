<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SmsNotification;
use App\Models\User;
use config;

class SmsNotificationController extends Controller
{
    //
    public function __construct(){

    }
    public function sendSmsNotification(){
        $user = User::find(1);
        $vonage_api = Config('vonage.api_key');
        $vonage_api_secret = Config('vonage.api_secret');
        $vonage_sms_from = Config('vonage.sms_from');
        $basic  = new \Vonage\Client\Credentials\Basic($vonage_api, $vonage_api_secret);
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($user['phone_number'], $vonage_sms_from, 'A text message sent using the Nexmo SMS API')
        );

        $message = $response->current();
        if ($message->getStatus() == 0) {
            return back()->with('success','SMS Notification send to '.$user['phone_number'] .' successfully!');
        } else {
            return back()->with('failure','SMS Notification send to '.$user['phone_number'] .' Failed!');
        }
    }
}
