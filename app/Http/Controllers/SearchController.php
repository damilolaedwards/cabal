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

	 
}