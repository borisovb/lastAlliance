<?php namespace App\Http\Controllers;

use App\Episode;
use App\Project;
use Mail;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

//	/**
//	 * Create a new controller instance.
//	 *
//	 * @return void
//	 */
//	public function __construct()
//	{
//		$this->middleware('guest');
//	}


	public function index()
	{
        $episodes = Episode::paginate(6);

		return view('main/index', ['episodes' => $episodes]);
	}

}
