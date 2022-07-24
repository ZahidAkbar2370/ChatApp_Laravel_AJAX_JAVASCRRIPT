<?php

use App\Http\Controllers\ChatController;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post("send-message", [ChatController::class, "store"]);
Route::get("messages/{reciver_id}", [ChatController::class, "index"]);
Route::get("users", [ChatController::class, "users"]);
Route::get("users/{name}", [ChatController::class, "userByName"]);
Route::get('/', function () {
    $sender_user_name = User::find("1");
    $reciver_user_name = User::find("2");
    $chats = DB::select("SELECT * FROM chats 
    WHERE (sender_id = '"."1"."' 
    AND reciver_id = '"."2"."') 
    OR (sender_id = '"."2"."' 
    AND reciver_id = '"."1"."') 
    ORDER BY created_at ASC
    ");
    return view('second_chat', ["chats" => $chats, "reciver_user_name" => $reciver_user_name, "sender_user_name" => $sender_user_name]);
});

Route::get('/chat', function () {
    // sender_id reciver_id
    $chats = DB::select("SELECT * FROM chats 
    WHERE (sender_id = '"."1"."' 
    AND reciver_id = '"."2"."') 
    OR (sender_id = '"."2"."' 
    AND reciver_id = '"."1"."') 
    ORDER BY id DESC
    ");
    
    // echo "<pre>";
    // print_r($chats);
    // echo "</pre>";exit;
    $allChat = Chat::where("sender_id", "1")->orWhere("reciver_id", "2")->orWhere("sender_id", "2")->orWhere("reciver_id", "1")->get();
    return view('chat')
    ->with("chats", $chats)->with("allChat" , $allChat);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
