<?php
use App\User;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Log;
 use Illuminate\Support\Facades\File;
 use Mail;
 use Auth;
class EventController extends Controller
{
	public function getEvent($id){

	$event = \App\Event::where('id', $id)->first();
	$eventlikecount = \App\Eventlike::where('event_id', $id)->count();
	$eventgoingcount = \App\Eventgoing::where('event_id', $id)->count();
		$emotionfaces = array(':smile:', ':sad:', ':arrow:', ':cool:', ':cry:', ':grin:', ':confused:', ':bigeyes:', ':evil:', ':exclaim:', ':geek:', ':idea:', ':lol:', ':mad:', ':green:', ':neutral:', ':question:', ':happy:', ':redface:', ':rolleyes:', ':surprised:', ':devil:', ':wink:');

		$emotions = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink');
		$images = [];
		for ($i = 0; $i < count($emotions); $i++) {
		$images[] = '<img src="/images/smilies/icon_'.$emotions[$i].'.gif " id="addSmiley" alt="" />';
		}
		return view('Templates.eventview')->with('event',$event)->with('images', $images)->with('emotions', $emotions)->with('emotionfaces', $emotionfaces)->with('eventlikecount', $eventlikecount)->with('eventgoingcount', $eventgoingcount);

	}

	public function getEventForm()
	{
		if(Auth::user()->is_banned == 1){
			return redirect()->back()->with('warning', 'You can\'t post an event because you are currently on a 24hr ban');
		}
		return view('Templates.eventsform');
	}

	public function postEventForm(Request $request)
	{
		$this->validate($request, [
        	'name' => 'required|max:120|string',
        	'details' => 'required|max:1000|string',
        	'location' => 'max:120|string',
        	'day'=>'not_in:dd',
			'month'=>'not_in:mm',
			'year'=>'not_in:yyyy',
        	'time'  => 'max:64|string',
        	'eventimage_1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventimage_2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventimage_3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		if (!checkdate ( $request->month , $request->day , $request->year )){
			return redirect()->back()->withInput()->with('warning', '*Invalid date combination');
		}
		if($request->hasfile('eventimage_1')){    
		$image = $request->file('eventimage_1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename1);
		$path1 = '/eventimages/'.$imagename1;
			}else{
				$path1 = null;
			}
		
	
		if($request->hasfile('eventimage_2')){    
		$image = $request->file('eventimage_2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename2);
		$path2 = '/eventimages/'.$imagename2;
		}else{
				$path2 = null;
			}
		
			
			
			
			if($request->hasfile('eventimage_3')){    
		$image = $request->file('eventimage_3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename3);
		$path3 = '/eventimages/'.$imagename3;
		}else{
				$path3 = null;
			}

			if($request->hasFile('eventfile')){   
			$file = $request->file('eventfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		
		$file->move(public_path('eventfile/'), $filename);
		$filepath = '/eventfile/'.$filename;
	}else{
		$filepath = null;
	}
			

		\Auth::user()->events()->create([
			
		
			'eventimage_1' => $path1,
			'eventimage_2' => $path2,
			
			'eventimage_3' => $path3,
			'eventfile' => $filepath,

			
			'name' => $request->input('name'),
			'details' => $request->input('details'),
			'location' => $request->input('location'),
			'day' => $request->input('day'),
			'month' => $request->input('month'),
			'year' => $request->input('year'),
			'time' => $request->input('time'),
			'slug' => str_slug( $request->input('name'), "-"),
			
			'institution_id' => \Auth::user()->institution_id,
			
			]);
		 $eventlocation = route('event.index').'#vSVHgbv9Xs';
		return redirect($eventlocation)->with('info', 'Event successfully created!.');
	}

	public function Like(Request $request){
	
		$event_id = $request['eventId'];
		
		$is_like = $request['isLike'] === 'true';
		$event = \App\Event::find($event_id);
		if(!$event){
			return null;
		}
		$user = \Auth::user();
	$like = $user->eventlikes()->where('event_id', $event_id)->first();
		$update = true;
		if ($like == null){  
			
			$like = new \App\Eventlike();

		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->event_id = $event->id;
		$like->save();
		 $trial =\App\Eventlike::where('event_id', $event_id)->count();
		 $myLikes = ['id' => $trial];
		 return 
		 response()->json($myLikes);
		}

	public function Going(Request $request){

		$event_id = $request['eventId'];
		
		$is_going = $request['isGoing'] === 'true';
		$event = \App\Event::find($event_id);
		if(!$event){
			return null;
		}
		$user = \Auth::user();
	$going = $user->eventgoings()->where('event_id', $event_id)->first();
		$update = true;
		if ($going == null){  
			
			$going = new \App\Eventgoing();

		}
		$going->going = $is_going;
		$going->user_id = $user->id;
		$going->event_id = $event->id;
		$going->save();
		 $trial =\App\Eventgoing::where('event_id', $event_id)->count();
		 $myLikes = ['id' => $trial];
		 return 
		 response()->json($myLikes);
		}


	public function getEditEvent($eventId){
		
		$event = \App\Event::find($eventId);
		
		if($event->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		return view('Templates.editevent')->with('event', $event);
}
public function postEditEvent(Request $request, $eventId)
	{
		$event = \App\Event::find($eventId);
		if($event->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		$this->validate($request, [
        	'name' => 'required|max:120|string',
        	'details' => 'required|max:1000|string',
        	'location' => 'max:120|string',
        	'day'=>'not_in:dd',
			'month'=>'not_in:mm',
			'year'=>'not_in:yyyy',
        	'time'  => 'max:64|string',
        	'eventimage_1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventimage_2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventimage_3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'eventfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		if (!checkdate ( $request->month , $request->day , $request->year )){
			return redirect()->back()->withInput()->with('warning', '*Invalid date combination');
		}
		$imagepath1 = $event->eventimage_1;
		if($request->hasfile('eventimage_1')){
			if($imagepath1 !== null){   
		unlink(public_path().$imagepath1); }      
		$image = $request->file('eventimage_1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename1);
		$path1 = '/eventimages/'.$imagename1;

			}else{
				$blank = $event->eventimage_1;
				$path1 = $blank;
			}
		
		$imagepath2 = $event->eventimage_2;
		if($request->hasfile('eventimage_2')){
			if($imagepath2 !== null){   
		unlink(public_path().$imagepath2); }     
		$image = $request->file('eventimage_2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename2);
		$path2 = '/eventimages/'.$imagename2;
		}else{
				$blank = $event->eventimage_2;
				$path2 = $blank;
			}
		
			
			
			$imagepath3 = $event->eventimage_3;
			if($request->hasfile('eventimage_3')){
				if($imagepath3 !== null){   
		unlink(public_path().$imagepath3); }   
		$image = $request->file('eventimage_3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/eventimages/') .$imagename3);
		$path3 = '/eventimages/'.$imagename3;
		}else{
				$blank = $event->eventimage_3;
				$path3 = $blank;
			}
			$eventfilepath = $event->eventfile;
			if($request->hasFile('eventfile')){
			if($eventfilepath !== null){   
		unlink(public_path().$eventfilepath); } 
			$file = $request->file('eventfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		
		$file->move(public_path('eventfile/'), $filename);
		$filepath = '/eventfile/'.$filename;
	}else{
		$blank = $event->eventfile;
				$filepath = $blank;
	}

		$event->update([
			'user_id' => \Auth::user()->id,
			
		
			'eventimage_1' => $path1,
			'eventimage_2' => $path2,
			
			'eventimage_3' => $path3,
			'eventfile' => $filepath,

			
			'name' => $request->input('name'),
			'details' => $request->input('details'),
			'location' => $request->input('location'),
			'day' => $request->input('day'),
			'month' => $request->input('month'),
			'year' => $request->input('year'),
			'time' => $request->input('time'),
			'slug' => str_slug( $request->input('name'), "-"),
			
			
			
			]);
		$newEventId = $event->id;
		$slug = str_slug( $request->input('name'), "-");
		$newUrl = url('/').'/event/'.$newEventId.'/'.$slug; 
		return redirect($newUrl)->with('info', 'Event successfully updated!');
	}

	public function deleteEvent($eventId){
		
		$event = \App\Event::find($eventId);
		if($event->user_id !== \Auth::user()->id || !$event){
			return redirect()->back();
		}
		$imagepath1 = $event->eventimage_1;
		$imagepath2 = $event->eventimage_2;
		$imagepath3 = $event->eventimage_3;
		$eventfilepath = $event->eventfile;
		if($imagepath1 !== null){   
		unlink(public_path().$imagepath1); }
		if($imagepath2 !== null){   
		unlink(public_path().$imagepath2); }
		if($imagepath3 !== null){   
		unlink(public_path().$imagepath3); }
		if($eventfilepath !== null){   
		unlink(public_path().$eventfilepath); }
		$event->delete();
		return redirect()->route('event.index');
}

public function deleteFirstImage($eventId){
	$event = \App\Event::find($eventId);
	if($event->user_id !== \Auth::user()->id  || !$event){
			return redirect()->back();

		}
	$imagepath1 = $event->eventimage_1;
	unlink(public_path().$imagepath1);
		$event->update([
	'eventimage_1' => null,
	]);
		
	return redirect()->back();
}

public function deleteSecondImage($eventId){
	$event = \App\Event::find($eventId);
	if($event->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath2 = $event->eventimage_2;
	unlink(public_path().$imagepath2);
		$event->update([
	'eventimage_2' => null,
	]);
		
	return redirect()->back();
}

public function deleteThirdImage($eventId){
	$event = \App\Event::find($eventId);
	if($event->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath3 = $event->eventimage_3;
	unlink(public_path().$imagepath3);
		$event->update([
	'eventimage_3' => null,
	]);
		
	return redirect()->back();
}

public function deleteFile($eventId){
	$event = \App\Event::find($eventId);
	if($event->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$filepath = $event->eventfile;
	unlink(public_path().$filepath);
		$event->update([
	'eventfile' => null,
	]);
		
	return redirect()->back();
}

public function getReport($eventId){
$event = \App\Event::find($eventId);
	if(!$event){
			return redirect()->back();
		}
		return view('Templates.reports.eventreport')->with('event', $event);
}
public function postReport(Request $request){

	$this->validate($request, [
		'report' => 'required',
		]);
	$reportString = implode(", ", $request->get('report'));
	 $data = array(
		'report' => $reportString, 
		'reportmessage' => $request->message,
		'reporturl' => $request->reporturl,
		);
	 Mail::send('email.event', $data, function ($message)  use ($data){
    $message->from('noreply@mycampus.ng');
    $message->subject('Report');
    $message->to('damilolaedwards@gmail.com');
});
	 return redirect($request->reporturl)->with('info', 'Report successfully sent!');
}
}