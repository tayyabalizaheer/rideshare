<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Auth;
class ChatController extends Controller
{
    public function index($pnr)
    {
    	$page_title = 'Chat';
		$chats = Chat::where('pnr',$pnr)->get();
		return view('chat.index',compact('chats','page_title','pnr'));
    	
    }
    public function send_msg(Request $req)
    {
    	$userId = Auth::user()->id;
    	$chat = new Chat;
    	$content = $req->input('msg_txt');

    	
    	$chat->user_id = $userId;
    	$chat->content = $content;
    	$chat->pnr = $req->input('pnr');
    	$chat->status = 0;
    	$chat->save();
    	$time = date('d-M H:i');
    	$msg = view('chat.send_msg',compact('content','time'))->render();
    	return $msg;
    }

    public function select_chat(Request $req)
    {
    	$userId = $req->input('user_id');
    	$chats = Chat::where('user_id',$userId)->get();
    	$User = User::where('id',$userId)->first();
    	$chats = view('chat.conversation',compact('chats'))->render();
    	$return = [
    		'user' => $User,
    		'chats' => $chats,
    	];

    	return json_encode($return);
    }
}
