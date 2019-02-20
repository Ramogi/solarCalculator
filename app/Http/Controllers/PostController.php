<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;
use Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //$this->middleware('auth')->only(['create', 'store', 'update','destroy']);
    }
    public function index()
    {
       $posts = Post::orderBy('id','desc')->paginate(5);
       return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  $this->authorize('create',$post);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, array(
            'title' =>'required|max:190',
            'category' =>'required|max:190',
            'body' =>'required'
        ));

        //store in db
        $post = new Post;
        $post->title=$request->title;
        $post->category=$request->category;
        $post->user_id=auth()->id();
        $post->body=Purifier::clean($request->body);
        $post->save();
        Session::flash('success','Blog successfuly published!');

        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);

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
        return view('posts.edit')->withPost($post);
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
        // Form validation
        $this->validate($request, array(
            'title' =>'required|max:190',
            'category' =>'required|max:190',
            'body' =>'required'
        ));

        //save in db
        $post = Post::find($id);
        $post->title=$request->input('title');
        $post->category=$request->input('category');
        $post->body=Purifier::clean($request->input('body'));
        $post->save();
        Session::flash('success','Blog successfuly updated!');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        Session::flash('success','Blog successfuly deleted!');

        return redirect()->route('posts.index');
    }
}
