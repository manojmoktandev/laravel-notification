<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailNotificationController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\DatabaseNotificationController;
use App\Http\Controllers\SlackNotificationController;
use App\Http\Controllers\SmsNotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    /**
     * send notification through mail
    */
        // $emailController = new EmailNotificationController;
        // $emailParams = ['title'=>'Dashboard',
        //         'slug-title'=>'dashboard'];
        // $emailController->sendNotification($emailParams);

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /**
     * show notify auth user related notification using database
     * */
    Route::get('/email-notify', [EmailNotificationController::class, 'emailNotify'])->name('email.notification');
    Route::get('/database-notify', [DatabaseNotificationController::class, 'databaseNotify'])->name('database.notification');

    Route::get('/database-notification-markread/{id}', [DatabaseNotificationController::class, 'markAsRead'])->name('database.notification-mark-read');
    Route::delete('/notification/{id}/{user_id}', [DatabaseNotificationController::class, 'removeNotification'])->name('database.remove-notification');

    Route::get('/slack-notify', [SlackNotificationController::class, 'slackNotify'])->name('slack.notification');

    Route::get('/sms-notification',[SmsNotificationController::class,'sendSmsNotification'])->name('sms.notification');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
