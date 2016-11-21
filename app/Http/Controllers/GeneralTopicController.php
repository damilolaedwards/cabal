<?php
use App\User;
use App\Category;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Mail;
use Auth;
class GeneralTopicController extends Controller
{

	public function getCategory($category){

		$category = \App\Category::where('name', $category)->first();
		
		if (!$category){
		abort(404);
	}
	

	return view('Templates.generalforumtopics')->with('category', $category);
	}
	public function createGeneralTopic($category){
		if(Auth::user()->is_banned == 1){
			return redirect()->back()->with('warning', 'You can\'t create a topic because you are currently on a 24hr ban');
		}
		$category = \App\Category::where('name', $category)->first();
		
		return view('Templates.generalforumcreate')->with('category', $category);
	}

	public function postGeneralTopic(Request $request, $category){
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
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename1);
		$path1 = '/generaltopicimages/'.$imagename1;
			}
		else{
			$path1 = null;
		}
	
		if($request->hasfile('forumimage2')){    
		$image = $request->file('forumimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename2);
		$path2 = '/generaltopicimages/'.$imagename2;
		}
		else{
			$path2 = null;
		}
			
			
			
			if($request->hasfile('forumimage3')){    
		$image = $request->file('forumimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename3);
		$path3 = '/generaltopicimages/'.$imagename3;
		}
			else{
				$path3 = null;
			}
			if($request->hasfile('forumfile')){
			$file = $request->file('forumfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/generaltopicfile/') ,$filename);
		$filepath = '/generaltopicfile/'.$filename;
	}else{
		$filepath = null;
	}
	$category = \App\Category::where('name', $category)->first();
			\Auth::user()->generaltopics()->create([
			
		
			'forumimage1' => $path1,
			'forumimage2' => $path2,
			
			'forumimage3' => $path3,
			'slug' => str_slug( $request->input('forumtitle'), "-"),
			'forumfile'  => $filepath,
			'category_id' => $category->id,
			'title' => $request->input('forumtitle'),
			'body' => $request->input('forumbody'),
			'user_id' => \Auth::user()->id,
			]);

			return redirect()->route('category',['category' => $category->name]);
	}

	public function viewGeneralTopic($category, $id){
		$emotionfaces = array(':smile:', ':sad:', ':arrow:', ':cool:', ':cry:', ':grin:', ':confused:', ':bigeyes:', ':evil:', ':exclaim:', ':geek:', ':idea:', ':lol:', ':mad:', ':green:', ':neutral:', ':question:', ':happy:', ':redface:', ':rolleyes:', ':surprised:', ':devil:', ':wink:');

		$emotions = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink');
		$images = [];
		for ($i = 0; $i < count($emotions); $i++) {
		$images[] = '<img src="/images/smilies/icon_'.$emotions[$i].'.gif " id="addSmiley" alt="$emotions[$i]" />';
		}
		$topic= \App\GeneralTopic::where('id', $id)->first();
		$category = \App\Category::where('name', $category)->first();
	
		return view('Templates.generalforumview')->with('topic', $topic)->with('category', $category)->with('images', $images)->with('emotions', $emotions)->with('emotionfaces', $emotionfaces);
	}
	

	public function getGeneralTopicUpdate($category,$topicId){

		$topic = \App\GeneralTopic::find($topicId);
		$category = \App\Category::find($topic->category_id);
		if($topic->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		return view('Templates.editgeneraltopic')->with('topic', $topic)->with('category', $category);
	}
	public function postGeneralTopicUpdate(Request $request, $category, $topicId){
		$topic = \App\GeneralTopic::find($topicId);
		$category = \App\Category::find($topic->category_id);
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
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename1);
		$path1 = '/generaltopicimages/'.$imagename1;
		
			}
		else{
			$blank = $topic->forumimage1;
			$path1 = $blank;
		}
	
		if($request->hasfile('topicimage2')){    
		$image = $request->file('topicimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename2);
		$path2 = '/generaltopicimages/'.$imagename2;
		
		}
		else{
			$blank = $topic->forumimage2;
			$path2 = $blank;
		}
			
			
			
			if($request->hasfile('topicimage3')){    
		$image = $request->file('topicimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generaltopicimages/') .$imagename3);
		$path3 = '/generaltopicimages/'.$imagename3;
		
		}
			else{
				$blank = $topic->forumimage3;
			$path3 = $blank;;
			}
			if($request->hasfile('topicfile')){
			$file = $request->file('topicfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/generaltopicfile/') ,$filename);
		$filepath = '/generaltopicfile/'.$filename;
		
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
	return redirect($request->input('generaltopicredirect')); 
}
public function deleteFirstImage($topicId){
	$topic = \App\GeneralTopic::find($topicId);
	if($topic->user_id !== \Auth::user()->id  || !$topic){
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
	$topic = \App\GeneralTopic::find($topicId);
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
	$topic = \App\GeneralTopic::find($topicId);
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
	$topic = \App\GeneralTopic::find($topicId);
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

public function Like(Request $request){
		
		$topic_id = $request['topicId'];
		
		$is_like = $request['isLike'] === 'true';
		$topic = \App\GeneralTopic::find($topic_id);
		if(!$topic){
			return null;
		}
		$user = \Auth::user();
		$like = $user->generaltopiclikes()->where('topic_id', $topic_id)->first();
		$update = true;
		if ($like == null){  
			
			$like = new \App\GeneralTopicLike();

		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->topic_id = $topic->id;
		$like->save();
		$trial =\App\GeneralTopicLike::where('topic_id', $topic_id)->count();
		 $myLikes = ['id' => $trial];
		 return 
		 response()->json($myLikes);

	}
		
	

	public function getReport($category, $topicId){
$topic = \App\GeneralTopic::find($topicId);
$category = \App\Category::where('name', $category)->first();
	
		return view('Templates.reports.generaltopicreport')->with('topic', $topic)->with('category', $category);
}

public function closeThread($category, $topicId){

$closedtopic = \App\GeneralTopic::find($topicId);

	
		$closedtopic->thread_closed = 1;
			$closedtopic->save();
		
		
	return redirect()->back()->with('info', 'Thread successfully Closed');

}

public function openThread($category, $topicId){

$closedtopic = \App\GeneralTopic::find($topicId);

	
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
	 Mail::send('email.generaltopic', $data, function ($message)  use ($data){
    $message->from('noreply@campuscabal.com');
    $message->subject('Report');
    $message->to('Admin@campuscabal.com');
});
	 return redirect($request->reporturl)->with('info', 'Report successfully sent!');
}

}