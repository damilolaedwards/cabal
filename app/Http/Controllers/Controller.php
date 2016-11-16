<?php

namespace App\Http\Controllers;
use Auth;
use App;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 
   
    public function __construct(){
          if (Auth::check()){ 
        if(request()->ajax())
        {
        	return true;
        }
    	

    	$currentUser = Auth::user();


        // ^(?!.*(red|green|blue))
        // ...
        if($currentUser->read_last_message_at != null){  
        $unreadmessages = App\Message::where('reciever_id', $currentUser->id)->where('created_at',  '>' ,$currentUser->read_last_message_at)->count();
         }else{
            $unreadmessages = App\Message::where('reciever_id', $currentUser->id)->where('created_at',  '>'/* dummy past date variable */ ,'2015-11-08 09:51:20')->count();
         }
        // pass the data to the view
   
        $requestcount = $currentUser->friendRequests()->count();

        view()->share('unreadmessages', $unreadmessages);
        view()->share('requestcount', $requestcount);

         

        
 }

          }

}

