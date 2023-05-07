<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Notifications\DatabaseNotification;
// use Illuminate\Support\Facades\Notification;
use Auth;
class DatabaseNotificationController extends Controller
{
    //
    public function __construct(){

    }
    public function databaseNotify(){
        if(Auth::user()){
            $user =  User::whereId(5)->first();
            Auth::user()->notify(new DatabaseNotification($user));
            return back()->with('success','Database Notification sent successfully!');
        }
    }
    public function MarkAsRead($id){
        if($id){
            Auth::user()->notifications->where('id',$id)->MarkAsRead();
            return back()->with('success','Database Notification Mark as Read successfully!');
        }
    }
    public function removeNotification($id,$user_id){
        if(Auth::user()){
            Notification::where('id',$id)->delete();
            return back()->with('success','Database Notification remove successfully!');
        }
    }
}
