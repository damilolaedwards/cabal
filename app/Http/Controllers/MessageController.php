<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Message;
use Illuminate\Http\Request;
use Carbon\Carbon;
class MessageController extends Controller
{


	public function getMessages()
	{
		
			
		$user = Auth::user();
            $user->read_last_message_at = Carbon::now();
            $user->save();	
		$messages = \App\Message::where(function($query){
		return $query->where('reciever_id', Auth::user()->id);
	})->orderBy('created_at','desc')->paginate(20);
		
		return view('Templates.messages')->with('messages', $messages);
	
	}	

	public function getSentMessages()
	{
		$messages = \App\Message::where(function($query){
		return $query->where('sender_id', Auth::user()->id);
	})->orderBy('created_at','desc')->paginate(20);
		
		return view('Templates.sentmessages')->with('messages', $messages);
	
	}	
	
	
	


	public function getCreateMessage($username){
		$user = \App\User::where('username',$username)->first();
		return view('Templates.sendmessage')->with('user',$user);
	}

public function createMessage(Request $request){

	$userid = Auth::user()->id;
	$this->validate($request, [
        	'message_body' => 'required',
        	
        	
        	]);

	\App\Messages::create([
		'body' => $request->input('message_body'),
		'sender_id' => ($userid),
		'reciever_id' =>$request->input('message_to') ,
		
		]);
	return redirect()->route('messages.sent')->with('info', 'message sent!');
}

public function deleteMessage($messageId){
	$message_to_delete = \App\Message::find($messageId);
	if($message_to_delete->reciever_id !== Auth::user()->id || !$message_to_delete){
		return redirect()->back();
	}
	
	$message_to_delete->reciever_deleted = 1;
	$message_to_delete->save();
	return redirect()->back()->with('info', 'message successfully deleted!');
}

public function deleteSentMessage($messageId){

	$message_to_delete = \App\Message::find($messageId);
	
	if($message_to_delete->sender_id !== Auth::user()->id || !$message_to_delete){
		return redirect()->back();
	}
	
	$message_to_delete->sender_deleted = 1;
	$message_to_delete->save();
	return redirect()->back()->with('info', 'message successfully deleted!');
}
}