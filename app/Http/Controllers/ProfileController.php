<?php
use App\User;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Auth;
use App\User;
class ProfileController extends Controller
{
public function getProfile($username){
	$friends = \Auth::user()->friends();
	$user_id = \Auth::user()->id;
	$user = \App\User::where('username', $username)->first();

	if (!$user){
		abort(404);
	}
	 $emotionfaces = array(':smile:', ':sad:', ':arrow:', ':cool:', ':cry:', ':grin:', ':confused:', ':bigeyes:', ':evil:', ':exclaim:', ':geek:', ':idea:', ':lol:', ':mad:', ':green:', ':neutral:', ':question:', ':happy:', ':redface:', ':rolleyes:', ':surprised:', ':devil:', ':wink:');

		$emotions = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink');
		$images = [];
		for ($i = 0; $i < count($emotions); $i++) {
		$images[] = '<img src="/images/smilies/icon_'.$emotions[$i].'.gif " id="addSmiley" alt="$emotions[$i]" />';
		}
	return view('Templates.profile')->with('user', $user)->with('friends', $friends)->with('images', $images)->with('emotions', $emotions)->with('emotionfaces', $emotionfaces);
}

public function getEdit(){
	$friends = \Auth::user()->friends();
	
	
	return view('Templates.editprofile')->with('friends', $friends);
}
public function postEdit(Request $request){
$this->validate($request, [
	'profile_image' =>'mimes:jpg,jpeg,png,gif|max:2048',
	'personal_text' =>'string|max:255',
	
	]);
		if($request->hasfile('profile_image')){
		$profilepic =	\Auth::user()->profile_image;
		
		if(\Auth::user()->profile_image !== null){   
		unlink(public_path().$profilepic); }   
		$image = $request->file('profile_image');
		$imagename = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(160,160)->save(public_path('/profileimages/') .$imagename);
		
	
		\Auth::user()->update([
			'profile_image' => '/profileimages/'.$imagename,
			]);
			}
	\Auth::user()->update([
		    'personal_text' => $request->input('personal_text'),
			
			
			
		]);
		 return redirect()->route('profile',['username' => \Auth::user()->username])->with('info','Your profile has been succesfully updated.') ;
}
	public function banUser($user){
		$banuser = User::where('username', $user)->first();
		if(Auth::user()->role != 'adminstrator' && $banuser->is_banned == false && $banuser->id == Auth::user()->id ){
			redirect()->back();
		}
		
		$banuser->is_banned = 1;
			$banuser->save();

	return	redirect()->back()->with('warning', 'User ' . $banuser->username . ' succesfully banned');
	}

	public function unbanUser($user){
		$banuser = User::where('username', $user)->first();
		if(Auth::user()->role != 'adminstrator' && $banuser->is_banned == true && $banuser->id == Auth::user()->id){
			redirect()->back();
		}
		
		$banuser->is_banned = 0;
			$banuser->save();
		
	return	redirect()->back()->with('info', 'User ' . $banuser->username . ' succesfully unbanned');
	}				
}