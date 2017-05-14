<?php
use App\User;
use App\Like;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Mail;
use Auth;
class CampusTopicController extends Controller
{
	public function createCampusTopic(){
		if(Auth::user()->is_banned == 1){
			return redirect()->back()->with('warning', 'You can\'t create a topic because you are currently on a 24hr ban');
		}
		return view('Templates.forumform');
	}

	public function postCampusTopic(Request $request){
		$this->validate($request, [
        	'forumtitle' => 'required|max:120|string',
        	'forumbody' => 'required|string',
        	
        	'forumimage1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'forumimage2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'forumimage3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'forumfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		if($request->hasfile('forumimage1')){    
		$image = $request->file('forumimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename1);
		$path1 = '/campustopicsimages/'.$imagename1;
			}else{
				$path1 = null;
			}
		
	
		if($request->hasfile('forumimage2')){    
		$image = $request->file('forumimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename2);
		$path2 = '/campustopicsimages/'.$imagename2;
		}else{
				$path2 = null;
			}
		
			
			
			if($request->hasfile('forumimage3')){    
		$image = $request->file('forumimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename3);
		$path3 = '/campustopicsimages/'.$imagename3;
		}else{
				$path3 = null;
			}
			
			if($request->hasfile('forumfile')){
			$file = $request->file('forumfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/campustopicsfile/') ,$filename);
		$filepath = '/campustopicsfile/'.$filename;
	}else{
				$filepath = null;
			}
			\Auth::user()->campustopics()->create([
			
		
			'forumimage1' => $path1,
			'forumimage2' => $path2,
			
			'forumimage3' => $path3,
			'slug' => str_slug( $request->input('forumtitle'), "-"),
			'forumfile'  => $filepath,
			'institution_id' => \Auth::user()->institution_id,
			'title' => $request->input('forumtitle'),
			'body' => $request->input('forumbody'),
			'user_id' => \Auth::user()->id,
			]);
			$campuslocation = route('homepage').'#vSVBfc9Xs';
			return redirect($campuslocation);
	}

	public function viewCampusTopic($id){
		 $campustopiclikes = \App\Like::where('topic_id', $id)->count();
    		
		$emotionfaces = array(':smile:', ':sad:', ':arrow:', ':cool:', ':cry:', ':grin:', ':confused:', ':bigeyes:', ':evil:', ':exclaim:', ':geek:', ':idea:', ':lol:', ':mad:', ':green:', ':neutral:', ':question:', ':happy:', ':redface:', ':rolleyes:', ':surprised:', ':devil:', ':wink:');

		$emotions = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink');
		$images = [];
		for ($i = 0; $i < count($emotions); $i++) {
		$images[] = '<img src="/images/smilies/icon_'.$emotions[$i].'.gif " id="addSmiley" alt="" />';
		}
		$campustopic = \App\Campustopic::where('id', $id)->first();
		if(!$campustopic){
			return redirect()->back();
		}
		$campusposts = \App\Campuspost::where('topic_id', $id)->paginate(40);
		$lastPage = $campusposts->lastPage();
		return view('Templates.forumview')->with('campustopic', $campustopic)->with('images', $images)->with('emotions', $emotions)->with('emotionfaces', $emotionfaces)->with('campusposts', $campusposts)->with('campustopiclikes', $campustopiclikes)->with('lastPage', $lastPage);
	}

	public function Like(Request $request){
		
		$topic_id = $request['topicId'];
		
		$is_like = $request['isLike'] === 'true';
		$topic = \App\Campustopic::find($topic_id);
		if(!$topic){
			return null;
		}
		$user = \Auth::user();
		$like = $user->likes()->where('topic_id', $topic_id)->first();
		$update = true;
		if ($like == null){  
			
			$like = new \App\Like();

		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->topic_id = $topic->id;
		$like->save();
		 $trial =\App\Like::where('topic_id', $topic_id)->count();
		 $myLikes = ['id' => $trial];
		 return 
		 response()->json($myLikes);

	}
		
	
	public function getUpdateTopic($topicId){

		$topic = \App\Campustopic::find($topicId);
		if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		return view('Templates.editcampustopic')->with('topic', $topic);
	}
	public function postUpdateTopic(Request $request, $topicId){
		$topic = \App\Campustopic::find($topicId);
		if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		$this->validate($request, [
        	'topictitle' => 'required|max:120|string',
        	'topicbody' => 'required|string',
        	
        	'topicimage1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'topicimage2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'topicimage3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'topicfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		if($request->hasfile('topicimage1')){    
		$image = $request->file('topicimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename1);
		$path1 = '/campustopicsimages/'.$imagename1;
		
			}
		else{
			$blank = $topic->forumimage1;
			$path1 = $blank;
		}
	
		if($request->hasfile('topicimage2')){    
		$image = $request->file('topicimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename2);
		$path2 = '/campustopicsimages/'.$imagename2;
		
		}
		else{
			$blank = $topic->forumimage2;
			$path2 = $blank;
		}
			
			
			
			if($request->hasfile('topicimage3')){    
		$image = $request->file('topicimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/campustopicsimages/') .$imagename3);
		$path3 = '/campustopicsimages/'.$imagename3;
		
		}
			else{
				$blank = $topic->forumimage3;
			$path3 = $blank;;
			}
			if($request->hasfile('topicfile')){
			$file = $request->file('topicfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/campustopicsfile/') ,$filename);
		$filepath = '/campustopicsfile/'.$filename;
		
	}else{
		$blank = $topic->forumfile;
			$filepath = $blank;
	}
	$topic->update([
			'user_id' => \Auth::user()->id,
		    'title' => $request->input('topictitle'),
			'body' => $request->input('topicbody'),
			'slug' => str_slug( $request->input('topictitle'), "-"),
			 'forumimage1' => $path1,
			'forumimage2' => $path2,
			'forumimage3' => $path3,
			'forumfile'  => $filepath,
		]);
	$newTopicId = $topic->id;
		$slug = str_slug( $request->input('topictitle'), "-");
		$newUrl = url('/').'/forum/'.$newTopicId.'/'.$slug;
	return redirect($newUrl); 
}
 public function deleteTopic($topicId){
 	$topic = \App\Campustopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id || \Auth::user()->role !== 'administrator'){
			return redirect()->back();
	}

	$topic->delete();
	return redirect()->route('homepage')->with('info', 'Thread successfully deleted!');

 }

   public function deleteFirstImage($topicId){
	$topic = \App\Campustopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();

		}
	$imagepath1 = $topic->forumimage1;
	unlink(public_path().$imagepath1);
		$topic->update([
	'forumimage1' => null,
	]);
		
	return redirect()->back();
}

public function deleteSecondImage($topicId){
	$topic = \App\Campustopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath2 = $topic->forumimage2;
	unlink(public_path().$imagepath2);
		$topic->update([
	'forumimage2' => null,
	]);
		
	return redirect()->back();
}

public function deleteThirdImage($topicId){
	$topic = \App\Campustopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath3 = $topic->forumimage3;
	unlink(public_path().$imagepath3);
		$topic->update([
	'forumimage3' => null,
	]);
		
	return redirect()->back();
}

public function deleteFile($topicId){
	$topic = \App\Campustopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$filepath = $topic->forumfile;
	unlink(public_path().$filepath);
		$topic->update([
	'forumfile' => null,
	]);
		
	return redirect()->back();
}

public function getReport($topicId){
$topic = \App\Campustopic::find($topicId);
	if(!$topic){
			return redirect()->back();
		}
		return view('Templates.reports.campustopicreport')->with('topic', $topic);
}

public function closeThread($topicId){

$closedtopic = \App\Campustopic::find($topicId);

	
		$closedtopic->thread_closed = 1;
			$closedtopic->save();
		
		
	return redirect()->back()->with('info', 'Thread successfully Closed');

}

public function openThread($topicId){

$closedtopic = \App\Campustopic::find($topicId);

	
		$closedtopic->thread_closed = 0;
			$closedtopic->save();
		
		
	return redirect()->back()->with('info', 'Thread successfully Opened');

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
	 Mail::send('email.campustopic', $data, function ($message)  use ($data){
    $message->from('noreply@mycampus.ng');
    $message->subject('Report');
    $message->to('damilolaedwards@gmail.com');
});
	 return redirect($request->reporturl)->with('info', 'Report successfully sent!');
}

}