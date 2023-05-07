<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Auth;
class EmailNotificationController extends Controller
{
    //
    public function emailNotify(){
        $user =  User::find(2);
        $email_params = ['auth-user'=>Auth::user(),'notify-user'=>$user,'title'=>'Email Notification','slug-title'=>'email-notify'];

        /**
         * Using Fascade Notification
         **/
        //Notification::send($user, new EmailNotification($email_params));

        /**
         * Using Trait Notifiable
         **/

        $user->notify(new EmailNotification($email_params));
        return back()->with('success','Email Notification sent successfully!');
    }
}
