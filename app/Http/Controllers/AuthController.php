<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Institution;
use Auth;
use Session;
use Carbon\Carbon;
use Mail;
use App\Message;

class AuthController extends Controller
{
	public function getHome(){
		
    return view('Templates.homepage');
}

	
	public function getFirstSignUp(Request $request)
	{
		if(Session::has('user'))
		{
			$data = Session::get('user');
			Session::forget('user');
			return view('Templates.registration_1')->with('input',$data);
		}
		return view('Templates.registration_1');
		}
	
	public function getRegister(Request $request)
	{
		if (!Session::has('user')){
			return redirect()->route('Auth.firstsignup');
		}
		$data =$request->session()->get('user');
		$institutions = \App\Institution::all();	
		return view('Templates.registration_2')->with('input', $data)->with('institutions',$institutions);
	}
	
public function postFirstSignUp(Request $request)
	{
		
		$this->validate($request, [
			'email'=> 'required|unique:users|email|max:255',
			'password'=> 'required|min:4',
			'confirm_password' => 'required|same:password'
			
			]);
		    
		 $data = Array ( 'email'=> $request->email , 'password'=>$request->password );
		 Session::push('user', $data);
		 if (Session::has('user')){
		return redirect()
		->route('register');}
	}

	public function postRegister(Request $request)
	{
		
		$this->validate($request, [

			'firstname'=> 'required|max:16|min:3|alpha_dash',
			'lastname'=> 'required|max:16|min:3|alpha_dash',
			'username'=> 'required|max:16|min:3|unique:users|alpha_dash|not_in:you',
			'sex'=> 'required|in:male,female',
			'day'=>'required|not_in:dd',
			'month'=>'required|not_in:mm',
			'year'=>'required|not_in:yyyy',
			'institution'=>'required|not_in:Institution'
			]);

		
		if (!checkdate ( $request->month , $request->day , $request->year )){
			return redirect()->back()->withInput()->with('warning', '*Invalid date combination');
		}
		$data = $request->session()->get('user');
		User::create([
			 'email'=> $data[0]['email'],
			'password' => bcrypt($data[0]['password']),
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'institution_id' => $request->input('institution'),
			'username' => $request->input('username'),
			'sex' => $request->input('sex'),
			'day' => $request->input('day'),
			'month' => $request->input('month'),
			'year' => $request->input('year'),
			]);

		Message::create([
			'sender_id' => 1,
			'reciever_id' => User::where('username', $request->input('username'))->firstOrFail()->id,
			'body' => "Hello, Welcome to Mycampus! \n Here is a quick guide though Mycampus.\n Mycampus is an online community for students of all tertiary institutions in Nigeria:<ul> <li>Meet people, discuss a number of topics on the General discussion forum.</li> <li>Don't be left out! discuss your campus related topic at the Campus forum.</li> <li>Sell and buy goods at the Campus Market place section.</li> <li>Don’t miss any event, post and check for campus events at the Events section.</li> </ul> Everything just perfectly works in your favour.\n <p>NOTE: Topics and posts posted at the general discussion forum would be visible to all members of Mycampus irrespective of their institutions while posts in the campus forum, marketplace and events are only visible to members of your Institution.</p> ",
			]);
		 $mydata = array(
		'username' => $request->input('username'), 
		'email' => $data[0]['email'],
		);
		 $request->session()->flush();
		Mail::send('email.welcome', $mydata, function ($message)  use ($mydata){
    $message->from('noreply@mycampus.ng');
    $message->subject('Welcome to Mycampus');
    $message->to($mydata['email']);
		
		
});
		return redirect()->route('Auth.login')->with('info','You are now registered. A confirmation message has been sent to your email, You may now log in.');
	}
	
	public function getLogin(){
		return view('Templates.login');
	}

	
	public function postLogin(Request $request){
		
        
		$this->validate($request, [
			'email'=> 'required',
			'password'=> 'required',
			]);
		 $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    $request->merge([$field => $request->input('email')]);
		 
		if (!Auth::attempt($request->only([$field,'password']), $request->has('remember'))){
			return redirect()->back()->with('warning','Invalid login details');
		}
		$user = Auth::user();
            $user->last_login_at = Carbon::now();
            $user->save();
		return redirect()->intended(url('/'));
	  }

	 
	 
	  public function getLogOut(){
	  	Auth::logout();
	  	return redirect()->route('homepage');
	  }
	}