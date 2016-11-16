<?php
use App\User;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class FriendController extends Controller
{
	public function getIndex()
	{
		$requests = \Auth::user()->friendRequests();
		return view('Templates.notification')->with('requests', $requests);
	}
	public function getAdd($username){
		$user = \App\User::where('username',$username)->first();

		if(!$user){
			return redirect()->route('profile');
		}
		if (\Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(\Auth::user())){
			return redirect()->route('profile', ['username' => $user->username]);
		}
		if (\Auth::user()->isFriendsWith($user)){
			return redirect()->route('profile', ['username' => $user->username]);
		}
		if (\Auth::user()->id === $user->id){
			return redirect()->route('homepage');
		}
		\Auth::user()->addFriend($user);
		return redirect()
		->route('profile',['username' => $user->username]);
	}
	public function getAccept($username){
		$user = \App\User::where('username',$username)->first();

		if(!$user){
			return redirect()->route('profile',['username' => $user->username]);
	}
	if(!\Auth::user()->hasFriendRequestRecieved($user)){  
	return redirect()->route('homepage');
}
	\Auth::user()->acceptFriendRequest($user);
	return redirect()->route('profile',['username' => $user->username]);
}

	public function postDelete($username){
		$user = \App\User::where('username', $username)->first();
		if (!\Auth::user()->isFriendsWith($user)){
			return redirect()->back();
		}
		\Auth::user()->deleteFriend($user);
		return redirect()->back()->with('info', 'You are no longer friend with '.$user->username);
	}	
}