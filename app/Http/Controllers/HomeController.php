<?php namespace App\Http\Controllers;

use App\BlogPost;
use App\Episode;
use App\Project;
use App\User;
use Mail;

class HomeController extends Controller {

	public function index()
	{
        $posts = BlogPost::orderBy('created_at', 'desc')->take(3)->get();
        $episodes = Episode::orderBy('created_at', 'desc')->take(12)->get();

        for ($i = 0; $i < count($posts); $i++) {
            $currentPost = $posts[$i];
            $currentPost['content'] = $this->stripBBCode($currentPost['content']);
        }

	return view('main/index', ['episodes' => $episodes, 'posts' => $posts]);
    }

    //make this a service
    function stripBBCode($text_to_search) {
        $pattern = '|[[\\/\\!]*?[^\\[\\]]*?]|si';
        $replace = '';
        return preg_replace($pattern, $replace, $text_to_search);
    }
}
