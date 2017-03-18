<?php
use App\User;

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class SearchController extends Controller
{
	public function getResults(Request $request)
	{
		$query = $request->input('query');
		if (!$query){
			return redirect()->back();
		}
		$users = \App\User::where('username', 'LIKE', "%{$query}%")->paginate(20);
		return view('Templates.search')->with('users', $users); 
	}

	 public function africasTalking(Request $request){
       
// Reads the variables sent via POST from our gateway
$sessionId   = $request->input('sessionId');
$serviceCode = $request->input('serviceCode');
$phoneNumber = $request->input('phoneNumber');
$text        = $request->input('text');
if ( $text == "" ) {
     // This is the first request. Note how we start the response with CON
     $response  = "CON What would you want to check \n";
     $response .= "1. My Account \n";
     $response .= "2. My phone number";
}
else if ( $text == "1" ) {
  // Business logic for first level response
  $response = "CON Choose account information you want to view \n";
  $response .= "1. Account number \n";
  $response .= "2. Account balance";
  
 }
 else if($text == "2") {
  // Business logic for first level response
  // This is a terminal request. Note how we start the response with END
  $response = "END Your phone number is $phoneNumber";
 }
 else if($text == "1*1") {
  // This is a second level response where the user selected 1 in the first instance
  $accountNumber  = "ACC1001";
  // This is a terminal request. Note how we start the response with END
  $response = "END Your account number is $accountNumber";
 }
    
 else if ( $text == "1*2" ) {
  
     // This is a second level response where the user selected 1 in the first instance
     $balance  = "NGN 10,000";
     // This is a terminal request. Note how we start the response with END
     $response = "END Your balance is $balance";
}
// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
// DONE!!!

    }
}