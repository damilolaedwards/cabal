<?php
use App\User;
use App\Advert;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;
use Mail;
use Auth;
class AdvertController extends Controller
{
	public function getMarketplace($id){
		$advert =\App\Advert::where('id', $id)->first();
		$advertlikecount = \App\Advertlike::where('advert_id', $id)->count();
		$emotionfaces = array(':smile:', ':sad:', ':arrow:', ':cool:', ':cry:', ':grin:', ':confused:', ':bigeyes:', ':evil:', ':exclaim:', ':geek:', ':idea:', ':lol:', ':mad:', ':green:', ':neutral:', ':question:', ':happy:', ':redface:', ':rolleyes:', ':surprised:', ':devil:', ':wink:');

		$emotions = array('smile', 'sad', 'arrow', 'cool', 'cry', 'grin', 'confused', 'bigeyes', 'evil', 'exclaim', 'geek', 'idea', 'lol', 'mad', 'green', 'neutral', 'question', 'happy', 'redface', 'rolleyes', 'surprised', 'devil', 'wink');
		$images = [];
		for ($i = 0; $i < count($emotions); $i++) {
		$images[] = '<img src="/images/smilies/icon_'.$emotions[$i].'.gif " id="addSmiley" alt="$emotions[$i]" />';
		}
		return view('Templates.marketview')->with('advert', $advert)->with('images', $images)->with('emotions', $emotions)->with('emotionfaces', $emotionfaces)->with('advertlikecount', $advertlikecount);
	}

	public function getAdvertForm(Request $request)
	{
		if(Auth::user()->is_banned == 1){
			return redirect()->back()->with('warning', 'You can\'t post an Ad because you are currently on a 24hr ban');
		}

		return view('Templates.marketplaceform');
	}

	public function postAdvertForm(Request $request)
	{
		$this->validate($request, [
        	'title' => 'required|max:64|string',
        	'description' => 'required|max:1000|string',
        	'price' => 'required|max:64|string',
        	'phone_number'  => 'max:64|string',
        	'advertimage1'  =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertimage2' =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertimage3' =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertfile' => 'mimes:pdf,odt,doc,docx|max:4096',
			]);
		if($request->hasfile('advertimage1')){    
		$image = $request->file('advertimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/advertimages/') .$imagename1);
		$path1 = '/advertimages/'.$imagename1;
			}
		else{
			$path1 = null;
		}
	
		if($request->hasfile('advertimage2')){    
		$image = $request->file('advertimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/advertimages/') .$imagename2);
		$path2 = '/advertimages/'.$imagename2;
		}
		else{
			$path2 = null;
		}
			
			
			
			if($request->hasfile('advertimage3')){    
		$image = $request->file('advertimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('/advertimages/') .$imagename3);
		$path3 = '/advertimages/'.$imagename3;
		}
			else{
				$path3 = null;
			}
			if($request->hasFile('advertfile')){   
			$file = $request->file('advertfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		
		$file->move(public_path('advertfile/'), $filename);
		$filepath = '/advertfile/'.$filename;
	}else{
		$filepath = null;
	}

		\Auth::user()->adverts()->create([
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'price' => $request->input('price'),
			'negotiable' => (($request["negotiable"] == 'negotiable' ) ? 1:0),
			'advertimage1' => $path1,
			'advertimage2' => $path2,
			
			'advertimage3' => $path3,
			'advertfile'  => $filepath,

			'phone_number' => $request->input('phone_number'),
			
			'slug' => str_slug( $request->input('title'), "-"),
			'institution_id' => \Auth::user()->institution_id

			]);
		return redirect()->route('advert.index');
	}
	public function Like(Request $request){
		
		$advert_id = $request['advertId'];
		
		$is_like = $request['isLike'] === 'true';
		$advert = \App\Advert::find($advert_id);
		if(!$advert){
			return null;
		}
		$user = \Auth::user();
		$like = $user->advertlikes()->where('advert_id', $advert_id)->first();
		$update = true;
		if ($like == null){  
			
			$like = new \App\Advertlike();

		}
		$like->like = $is_like;
		$like->user_id = $user->id;
		$like->advert_id = $advert->id;
		$like->save();
		 $trial =\App\Advertlike::where('advert_id', $advert_id)->count();
		 $myLikes = ['id' => $trial];
		 return 
		 response()->json($myLikes);

	}

	public function getEditAdvert($advertId){
		$advert = \App\Advert::find($advertId);
		if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		$advert = \App\Advert::find($advertId);
		if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		return view('Templates.editadvert')->with('advert', $advert);
}

	public function postEditAdvert(Request $request, $advertId){
		$advert = \App\Advert::find($advertId);
		if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
		$this->validate($request, [
        	'title' => 'required|max:64|string',
        	'description' => 'required|max:1000|string',
        	'price' => 'required|max:64|string',

        	'phone_number'  => 'max:64|string',
        	'advertimage1'  =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertimage2' =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertimage3' =>  'mimes:jpg,jpeg,png,gif|max:2048',
        	'advertfile' => 'mimes:pdf,odt,doc,docx|max:4096',

			]);
		$imagepath1 = $advert->advertimage1;
		if($request->hasfile('advertimage1')){
		if($imagepath1 !== null){   
		unlink(public_path().$imagepath1); }     
		$image = $request->file('advertimage1');
		$imagename1 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('advertimages/') .$imagename1);
		$path1 = '/advertimages/'.$imagename1;

			}
		else{
			$blank = $advert->advertimage1;
			$path1 = $blank;
		}
		$imagepath2 = $advert->advertimage2;
		if($request->hasfile('advertimage2')){
		if($imagepath2 !== null){   
		unlink(public_path().$imagepath2); }     
		$image = $request->file('advertimage2');
		$imagename2 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('advertimages/') .$imagename2);
		$path2 = '/advertimages/'.$imagename2;
		}
		else{
			$blank = $advert->advertimage2;
			$path2 = $blank;
		}
			
			
			$imagepath3 = $advert->advertimage3;
			if($request->hasfile('advertimage3')){
			if($imagepath3 !== null){   
		unlink(public_path().$imagepath3); }         
		$image = $request->file('advertimage3');
		$imagename3 = time(). "-" .$image->getClientOriginalName();
		Image::make($image->getRealPath())->resize(320,240)->save(public_path('advertimages/') .$imagename3);
		$path3 = '/advertimages/'.$imagename3;
		}
			else{
				$blank = $advert->advertimage3;
			$path3 = $blank;
			}

			$advertfilepath = $advert->advertfile;
			if($request->hasfile('advertfile')){ 
			if($advertfilepath !== null){   
		unlink(public_path().$advertfilepath); }     
			$file = $request->file('advertfile');
		$filename = time(). "-" .$file->getClientOriginalName();
		$file->move(public_path('/advertfile/') ,$filename);
		$filepath = '/advertfile/'.$filename;
	}else{
		$blank = $advert->advertfile;
			$filepath = $blank;
	}

		\App\Advert::find($advertId)->update([
			'user_id' => \Auth::user()->id,
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'price' => $request->input('price'),
			'negotiable' => (($request["negotiable"] == true ) ? 1:0),		
			'advertimage1' => $path1,
			'advertimage2' => $path2,
			
			'advertimage3' => $path3,
			'advertfile'  => $filepath,

			'phone_number' => $request->input('phone_number'),
			
			'slug' => str_slug( $request->input('title'), "-"),
			'institution_id' => \Auth::user()->institution_id

			]);
		return redirect($request->input('advertredirect'))->with('info', 'Advert successfully updated!');
	}
	public function deleteAdvert($advertId){
		
		$advert = \App\Advert::find($advertId);
		if($advert->user_id !== \Auth::user()->id  || !$advert){
			return redirect()->back();

		}
		$imagepath1 = $advert->advertimage1;
		$imagepath2 = $advert->advertimage2;
		$imagepath3 = $advert->advertimage3;
		$advertfilepath = $advert->advertfile;
		if($imagepath1 !== null){   
		unlink(public_path().$imagepath1); }
		if($imagepath2 !== null){   
		unlink(public_path().$imagepath2); }
		if($imagepath3 !== null){   
		unlink(public_path().$imagepath3); }
		if($advertfilepath !== null){   
		unlink(public_path().$advertfilepath); }
		$advert->delete();
		return redirect()->route('advert.index');
}
public function deleteFirstImage($advertId){
	$advert = \App\Advert::find($advertId);
	if($advert->user_id !== \Auth::user()->id  || !$advert){
			return redirect()->back();

		}
	$imagepath1 = $advert->advertimage1;
	unlink(public_path().$imagepath1);
		$advert->update([
	'advertimage1' => null,
	]);
		
	return redirect()->back();
}

public function deleteSecondImage($advertId){
	$advert = \App\Advert::find($advertId);
	if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath2 = $advert->advertimage2;
	unlink(public_path().$imagepath2);
		$advert->update([
	'advertimage2' => null,
	]);
		
	return redirect()->back();
}

public function deleteThirdImage($advertId){
	$advert = \App\Advert::find($advertId);
	if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$imagepath3 = $advert->advertimage3;
	unlink(public_path().$imagepath3);
		$advert->update([
	'advertimage3' => null,
	]);
		
	return redirect()->back();
}

public function deleteFile($advertId){
	$advert = \App\Advert::find($advertId);
	if($advert->user_id !== \Auth::user()->id){
			return redirect()->back();
		}
	$filepath = $advert->advertfile;
	unlink(public_path().$filepath);
		$advert->update([
	'advertfile' => null,
	]);
		
	return redirect()->back();
}
public function getReport($advertId){
$advert = \App\Advert::find($advertId);
	if(!$advert){
			return redirect()->back();
		}
		return view('Templates.reports.advertreport')->with('advert', $advert);
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
	 Mail::send('email.advert', $data, function ($message)  use ($data){
    $message->from('noreply@campuscabal.com');
    $message->subject('Report');
    $message->to('damilolaedwards@gmail.com');
});
	 return redirect($request->reporturl)->with('info', 'Report successfully sent!');
}
}