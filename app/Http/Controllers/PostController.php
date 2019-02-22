<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost as StorePostRequest;
use App\Http\Requests\UpdatePost as UpdatePostRequest;

use Gate;
use App\Post;
use Session;
use Purifier;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {


        $data = $request->only('title', 'category', 'body');
        $data['body'] = Purifier::clean($data['body']);
        $data['user_id'] = Auth::user()->id;
        $post = Post::create($data);
        Session::flash('success','Blog successfuly published!');
        return redirect()->route('show_post',$post->id);

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
    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        
        $data = $request->only('title', 'category', 'body');
        $data['body'] = Purifier::clean($data['body']);
        $post->fill($data)->save();
        Session::flash('success','Blog successfuly published!');
        return view('posts.show')->with('post',$post);
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
