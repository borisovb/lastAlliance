<?php namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Pagination;
use Illuminate\Support\Facades\Input;
use Golonka\BBCode\BBCodeParser;

class BlogController extends Controller
{
    const imageDirectory = 'images/blog/';

    public function viewPosts()
    {
        $posts = BlogPost::orderBy('created_at', 'desc')->paginate(3);

        for ($i = 0; $i < count($posts); $i++) {
            $currentPost = $posts[$i];
            $currentPost['content'] = $this->stripBBCode($currentPost['content']);
        }

        return view('posts/all')->with('posts', $posts);
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

    //make this a service
    function stripBBCode($text_to_search) {
        $pattern = '|[[\\/\\!]*?[^\\[\\]]*?]|si';
        $replace = '';
        return preg_replace($pattern, $replace, $text_to_search);
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
//        $post = BlogPost::where('slug', '=', $slug)->first();
//
//        if (is_null($slug))
//        {
            $post = BlogPost::where('id', '=', $id)->first();
//        }
//        else
//        {
//            $post = BlogPost::where('slug', '=', $slug)->where('id', '=', $id)->first();
//        }

        if (is_null($post))
        {
            flash('Тази новина не съшествува!')->error();
            return false;
        }

        $bbcode = new BBCodeParser();
        $content = $bbcode->parse($post->content);
        return ['post' => $post, 'content' => $content];
    }

    function create() {
        return view( 'blog/create_post' );
    }

//    function create_slug($string){
//        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
//        return $slug;
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $title = Input::get('title');

        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(self::imageDirectory, $imageName);
        $userId = auth()->user()->getAuthIdentifier();

        $blogPost = new BlogPost();
        $blogPost->fill(Input::all());
        $blogPost->image = '/' . self::imageDirectory . $imageName;
        $blogPost->author = $userId;
        $blogPost->slug = urlencode(Input::get('title'));
        $blogPost->save();

        return redirect()->route('view_post', ['id' => $blogPost->id]);
    }

    public function edit($id) {
        $post = BlogPost::where('id', $id)->get();
        return view('blog/edit', ['post' => $post[0]]);
    }

    public function update($id, Request $request) {
        $post = BlogPost::where('id', $id)->get()[0];
        $post->fill(Input::all());
        $image = $request->file('image');

        //Change the image if a new one is uploaded
        if ($image !== null) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(self::imageDirectory, $imageName);

            //delete the old image from the image directory
            unlink($_SERVER['DOCUMENT_ROOT'] . $post->image);

            $post->image = '/' . self::imageDirectory . $imageName;
        }

        $post->save();

        return redirect()->route('view_post', ['id' => $post->id]);
    }

    public function delete($id, Request $request) {
        BlogPost::where('id', $id)->delete();
        flash('Статията беше изтрита успешно!')->success();
        return redirect()->route('view_posts');
    }

    public function deleteProcess($id) {
        dd($id);
    }
}
