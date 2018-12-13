<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('created_at','desc')-> get();//call get() to fetch data 
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' =>'required',
            'description' => 'required',
            'coverImage' => 'image|nullable|max:25000'
        ]);

        //handle file upload

        if($request->hasFile('coverImage')){
            //get filename with extension
            $fileNameWithExt = $request->file('coverImage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get extension 
            $extension = $request->file('coverImage')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('coverImage')->storeAs('public/cover_images',$fileNameToStore);
        }
        //create post 

        $posts = new Post;
        $posts -> title = $request -> input('title');
        $posts -> description = $request ->input('description');
        //store user_id to the the table posts for respective posts of respective user
        $posts->user_id = auth()->user()->id;
        //store filename of coverimage
        $posts->coverImage = $fileNameToStore;
        $posts -> save();

        return redirect('/posts') -> with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view ('posts.show', compact('post'));
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

        //Checks if user is correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Oops!! Unathorized Page.');
        }

        return view ('/posts.edit', compact('post'));
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
        $this->validate($request,
        [
            'title' =>'required',
            'description' => 'required',
            'coverImage' => 'image|nullable|max:25000'
        ]);

        //handle file upload

        if($request->hasFile('coverImage')){
            //get filename with extension
            $fileNameWithExt = $request->file('coverImage')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //get extension 
            $extension = $request->file('coverImage')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('coverImage')->storeAs('public/cover_images',$fileNameToStore);
        }
        //Update post 
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->description = $request->input('description');
        if($request->hasFile('coverImage')){
            $posts->coverImage = $fileNameToStore;
        }
        $posts->save();

        /* 
        can be written in the following ways as well
        return redirect('/posts',compact('success','Post Updated')); 
        */
        return redirect('/posts')->with('success','Post Updated');
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
        //Checks if user is correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Oops!! Unathorized Page.');
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Removed!!');
    }
}
