<?php
use App\Advert;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Mail;
class HomeController extends Controller
{
	public function getHome()
	{	
		if (\Auth::check()) {


			
			$categories = \App\Category::all();
			
			$topics = \App\Campustopic::where(function($query){
			return $query->where('institution_id', Auth::user()->institution_id);
		})
		->orderBy('created_at', 'desc')->paginate(30);
			
		
		
		
		return view('Templates.homepage')->with('topics', $topics)->with('categories', $categories); 
	}
	return view('home');
	}


 public function getAdvertTab(){
 	$categories = \App\Category::all();
 	$adverts = \App\Advert::where(function($query){
			return $query->where('institution_id',Auth::user()->institution_id);
		})
		->orderBy('updated_at', 'desc')->paginate(30);
 	return view('Templates.advert')->with('adverts', $adverts)->with('categories', $categories);
 }

 public function getEventTab(){
 	$categories = \App\Category::all();
 $events = \App\Event::where(function($query){
			return $query->where('institution_id', Auth::user()->institution_id);
		})
		->orderBy('updated_at', 'desc')->paginate(30);
		
 	return view('Templates.event')->with('events',$events)->with('categories', $categories);
 }

 public function getDisclaimer(){
 	return view('Templates.footer.disclaimer');
 }

  public function getRules(){
 	return view('Templates.footer.rules&regulations');
 }

 public function getContact(){
 	return view('Templates.footer.contact');

 }
 public function getWelcome(){
 	return view('Templates.welcome');

 }
 public function postContact(Request $request){
 	
 	$this->validate($request, [
        	'subject' => 'required|max:120|string',
        	'email' => 'required|email',
        	'message'  => 'required',
        	
			]);
 	 $data = array(
		'email' => $request->email, 
		'subject' => $request->subject,
		'bodymessage' => $request->message,
		);

 	Mail::send('email.contact', $data, function ($message)  use ($data){
    $message->from($data['email']);
    $message->subject($data['subject']);
    $message->to('damilolaedwards@gmail.com');
});
 	return redirect()->back()->with('info', 'Message successfully sent!');
 }
}