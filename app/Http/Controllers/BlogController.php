<?php namespace App\Http\Controllers;

use App\BlogPost;

class BlogController extends Controller
{
    public function viewPosts()
    {
        $posts = BlogPost::paginate(2);
        return view('posts/all', ['posts' => $posts]);
    }
    public function viewPostSlug($id, $slug)
    {
        $arr = $this->viewPostProcess($id, $slug);

        if (!$arr)
        {
            return view('errors/404');
        }

        return view( 'posts/post', $arr );
    }

    public function viewPost($id)
    {
        $arr = $this->viewPostProcess($id, null);

        if (!$arr)
        {
            return view('errors/404');
        }

        return view( 'posts/post', $arr );
    }

    public function viewPostProcess($id, $slug)
    {
        $post = BlogPost::where('slug', '=', $slug)->first();

        if (is_null($slug))
        {
            $post = BlogPost::where('id', '=', $id)->first();
        }
        else
        {
            $post = BlogPost::where('slug', '=', $slug)->where('id', '=', $id)->first();
        }

        if (is_null($post))
        {
            flash('Тази новина не съшествува!')->error();
            return false;
        }

        return ['post' => $post];
    }
}
