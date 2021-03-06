<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
// use Illuminate\Support\Fascades\Storage;
use Storage;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *    //Only allowing the index page and the show page
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts =  Post::orderBy('title', 'dec')->get();
        // $posts =  Post::orderBy('title', 'dec')->limit(1)->get();
        // $posts = DB::select('SELECT * FROM posts');
        $posts =  Post::orderBy('created_at', 'dec')->paginate(3);
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
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
          'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File upload
        if($request->hasFile('cover_image')){
          // Get filename with the extension
          $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
          // Get just the filename
          $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
          // Get just the extension
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          // FileName to Store
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          // Upload the Image
          // $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
          // $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
          $file = Storage::disk('s3')->put($fileNameToStore, fopen($request->file('cover_image'), 'r+'), 'public');
          // Storage::disk('s3')->put($fileNameToStore, $request->file('cover_image'));
          // $var = Storage::disk('s3')->exists('avatar/jpg');
          // $files = Storage::files('uploads');
          // dd($files);
          $urlPrefixRaw = Storage::disk('s3')->url($file);
          $urlPrefix = substr_replace($urlPrefixRaw,"",-1);
          $url = $urlPrefix.$fileNameToStore;
        } else{
          $fileNameToStore = 'noimage.jpg';
        }




        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $url;
        $post->save();

        return redirect('/posts')->with('success', 'Blog Post Created');
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
        if(!$post){
          return redirect('/posts')->with('error', 'Post not found');
        }
        return view('posts.show')->with('post', $post);
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
        if(!$post){
          return redirect('/posts')->with('error', 'Post not found');
        }

        //Checking for the correct user

        if(auth()->user()->id !== $post->user_id){
          return redirect('/posts')->with('error', 'Unauthorized');
        }

        return view('posts.edit')->with('post', $post);
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
      $this->validate($request, [
        'title' => 'required',
        'body' => 'required'
      ]);


      // Handle File upload
      if($request->hasFile('cover_image')){
        // Get filename with the extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        // FileName to Store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload the Image
        $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
      }


      // Create Post
      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
      }
      $post->save();

      return redirect('/posts')->with('success', 'Blog Post Updated');
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

        // Checking for the correct user
        if(auth()->user()->id !== $post->user_id){
          return redirect('/posts')->with('error', 'Unauthorized');
        }

        if($post->cover_image != 'noimage.jpg'){
          Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Blog Post Deleted');
    }
}
