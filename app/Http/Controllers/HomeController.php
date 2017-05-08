<?php namespace App\Http\Controllers;

use App\BlogPost;
use App\Episode;
use App\Project;
use App\User;
use Mail;

class HomeController extends Controller {

	public function index()
	{
        $posts = BlogPost::take(3)->get();
        $episodes = Episode::orderBy('created_at', 'desc')->take(12)->get();

	return view('main/index', ['episodes' => $episodes, 'posts' => $posts]);
    }

}
