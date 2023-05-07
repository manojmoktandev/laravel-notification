<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SlackNotification;
use App\Models\User;
use App\Models\Notification;
use Auth;

class SlackNotificationController extends Controller
{
    //
    public function __construct(){
        //$this->middleware('auth');
    }
    public function slackNotify(){
        if(Auth::user()){
            $user =  User::whereId(1)->first();
            Auth::user()->notify(new SlackNotification($user));
            return back()->with('success','Slack Notification sent successfully!');
        }
    }
}
