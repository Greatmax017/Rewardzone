<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20, ['*'], 'post');
        return view('admin.blog_articles', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog_article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3|max:95',
            'content'=> 'required|min:10',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        //Generate Url and prevent duplicate urls
        $url = str_replace(' ', '-', $request->input('title'));
        $url = strtolower(preg_replace("/[^A-Za-z0-9\-]/", '',$url));
        for($i = 0; $i < 100; $i++){
            if(Post::where('url', $url)->count() == 0){
                break;
            }else{
                $url .= '-'.$i++;
            }
        }

        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $request->input('content'), $image);

        $post = new Post;
        $post->title = $request->input('title');
        $post->thumbnail = array_key_exists('src', $image) ? $image['src'] : null;
        $post->content = $request->input('content');
        $post->featured = 0;
        $post->tutorial = 0;
        $post->url = $url;
        $post->save();

        return redirect('/admin/blog')->with('success-status', 'Article successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if($post == null){
            return redirect('/admin/blog')->with('error-status', 'Article not found');
        }
        return view('admin.blog_article', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|min:3|max:95',
            'content'=> 'required|min:10',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $post = Post::find($id);
        if($post == null)
            return redirect()->back()->with('error-status', 'Article not found');

        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $request->input('content'), $image);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->thumbnail = array_key_exists('src', $image) ? $image['src'] : null;
        $post->save();

        return redirect()->back()->with('success-status', 'Article successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post == null)
            return response()->json(['status'=>'failure','message'=>'Article not found']);
        $post->delete();
        return response()->json(['status'=>'success','message'=>'Article successfully deleted']);
    }
}
