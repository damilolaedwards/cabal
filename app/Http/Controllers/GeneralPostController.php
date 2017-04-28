<?php
use App\User;
use App\GeneralTopic;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Mail;
use Auth;
class GeneralPostController extends Controller
{
public function GeneralPostReply(Request $request, $category, $topic_id){
		if(Auth::user()->is_banned == 1){
			return redirect()->back()->with('warning', 'You can\'t reply this topic because you are currently on a 24hr ban');
		}
		$this->validate($request, [
        
        	'postbody' => 'required|string',
        	
        	'postimage1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postimage2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postimage3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		if($request->hasfile('postimage1')){    
		$image = $request->file('postimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename1);
		$path1 = '/generalpostimages/'.$imagename1;
			}
		else{
			$path1 = null;
		}
	
		if($request->hasfile('postimage2')){    
		$image = $request->file('postimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename2);
		$path2 = '/generalpostimages/'.$imagename2;
		}
		else{
			$path2 = null;
		}
			
			
			
			if($request->hasfile('postimage3')){    
		$image = $request->file('postimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename3);
		$path3 = '/generalpostimages/'.$imagename3;
		}
			else{
				$path3 = null;
			}
			if($request->hasfile('postimage3')){ 
			$file = $request->file('postfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/generalpostfile/') ,$filename);
		$filepath = '/generalpostfile/'.$filename;
	}else{
				$filepath = null;
			}
			
		
			\Auth::user()->generalposts()->create([
			
		
			'postimage1' => $path1,
			'postimage2' => $path2,
			
			'postimage3' => $path3,
			
			'postfile'  => $filepath,
			
			'topic_id' => $topic_id,
			
			'body' => $request->input('postbody'),
			'user_id' => \Auth::user()->id,
			]);

			$slug = \App\GeneralTopic::find($topic_id)->slug;
			$lastcatPageUrl = $request->input('lastcatpage');
			$lastcatPagecount = $request->input('lastcatpagecount');
			$lastcatperpage = $request->input('lastcatperpage');
			$pageUrlplus = $lastcatPageUrl + 1;
	if($lastcatPagecount == $lastcatperpage){
	return redirect($category .'/'. $topic_id . '/'. $slug .'/'. '?page=' . $pageUrlplus . '#4qRr5OAp');	
	}else		
	
	return redirect($category .'/'. $topic_id . '/'. $slug .'/'. '?page=' . $lastcatPageUrl . '#4qRr5OAp');
	}
	public function Like(Request $request){  

		$post_id = $request['postId'];
		
		$is_like = $request['isLike'] === 'true';
		$post = \App\GeneralPost::find($post_id);
		if(!$post){
			return null;
		}
		$user = \Auth::user();
	$like = $user->generalpostlikes()->where('post_id', $post_id)->first();

		$update = true;

		if ($like == null){  
			
			$like = new \App\GeneralPostLike();

		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->post_id = $post->id;
		$like->save();
		 $trial =\App\GeneralPostLike::where('post_id', $post_id)->count();

		 $myLikes = ['id' => $trial];

		 return 
		 response()->json($myLikes);

	}

	
	public function getGeneralPostUpdate($category, $topicId, $slug, $postId){
		
		$post = \App\GeneralPost::find($postId);
		$inter = \App\GeneralTopic::find($post->topic_id);
		$category = \App\Category::find($inter->category_id);
		
		if($post->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
			
		return view('Templates.editgeneralpost')->with('post', $post)->with('category', $category);
}

public function postGeneralPostUpdate(Request $request, $category, $topicId, $slug, $postId){
		$post = \App\GeneralPost::find($postId);
		if($post->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		$this->validate($request, [
        	
        	'postbody' => 'required|string',
        	
        	'postimage1'  => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postimage2' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postimage3' => 'mimes:jpg,jpeg,png,gif|max:2048',
        	'postfile' => 'mimes:pdf,doc,docx,odt,txt|max:4096',
			]);
		$imagepath1 = $post->postimage1;
		if($request->hasfile('postimage1')){ 
		if($imagepath1 !== null){   
		unlink(public_path().$imagepath1); }    
		$image = $request->file('postimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename1);
		$path1 = '/generalpostimages/'.$imagename1;
			}
		else{

			$blank = $post->postimage1;
			$path1 = $blank;
		}
		$imagepath2 = $post->postimage2;
		if($request->hasfile('postimage2')){
		if($imagepath2 !== null){   
		unlink(public_path().$imagepath2); }     
		$image = $request->file('postimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename2);
		$path2 = '/generalpostimages/'.$imagename2;
		}
		else{
			$blank = $post->postimage2;
			$path2 = $blank;
		}
			
			
			$imagepath3 = $post->postimage3;
			if($request->hasfile('postimage3')){
			if($imagepath3 !== null){   
		unlink(public_path().$imagepath3); }     
		$image = $request->file('postimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->save(public_path('/generalpostimages/') .$imagename3);
		$path3 = '/generalpostimages/'.$imagename3;
		}
			else{
				$blank = $post->postimage3;
			$path3 = $blank;
			}

			$filepath = $post->postfile;
			if($request->hasfile('postfile')){
				if($filepath !== null){   
		unlink(public_path().$filepath); } 
			$file = $request->file('postfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/generalpostfile/') ,$filename);
		$filepath = '/generalpostfile/'.$filename;
	}else{
		$blank = $post->postfile;
			$filepath = $blank;
	}
	$post->update([
		    'user_id' => \Auth::user()->id,
			'body' => $request->input('postbody'),
			
			 'postimage1' => $path1,
			'postimage2' => $path2,
			'postimage3' => $path3,
			'postfile'  => $filepath,
		]);
	$postIDplus = $post->id - 1;
	$editpostURL = $request->input('generalpostredirect').'#'.$postIDplus;

	return redirect($editpostURL); 
	 
  }
 
public function deleteFirstImage($postId){
	$post = \App\GeneralPost::find($postId);
	if($post->user_id !== \Auth::user()->id  || !$post){
			return redirect()->back();

		}
	$imagepath1 = $post->postimage1;
	unlink(public_path().$imagepath1);
		$post->update([
	'postimage1' => null,
	]);
		
	return redirect()->back();
}

public function deleteSecondImage($postId){
	$post = \App\GeneralPost::find($postId);
	if($post->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath2 = $post->postimage2;
	unlink(public_path().$imagepath2);
		$post->update([
	'postimage2' => null,
	]);
		
	return redirect()->back();
}

public function deleteThirdImage($postId){
	$post = \App\GeneralPost::find($postId);
	if($post->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath3 = $post->postimage3;
	unlink(public_path().$imagepath3);
		$post->update([
	'postimage3' => null,
	]);
		
	return redirect()->back();
}

public function deleteFile($postId){
	$post = \App\GeneralPost::find($postId);
	if($post->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$filepath = $post->postfile;
	unlink(public_path().$filepath);
		$post->update([
	'postfile' => null,
	]);
		
	return redirect()->back();
}

public function getReport($category, $postId){
$post = \App\GeneralPost::find($postId);
	$category = \App\Category::where('name', $category)->first();
		return view('Templates.reports.generalpostreport')->with('post', $post)->with('category', $category);
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
    $message->from('noreply@mycampus.ng');
    $message->subject('Report');
    $message->to('damilolaedwards@gmail.com');
});
	 return redirect($request->reporturl)->with('info', 'Report successfully sent!');
}
}