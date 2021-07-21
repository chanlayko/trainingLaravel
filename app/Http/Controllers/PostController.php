<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Mail\PostStored;
use App\Models\category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use App\Events\PostCreateEvent;
use App\Http\Requests\PostRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\Postnotification;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = posts::all();

        // Mail::raw('hello world',function($msg){
        //     $msg->to('chan@gmail.com')->subject('Ap laravel lession');
        // });
        $user = Auth::user();
        $user->notify(new Postnotification());

        // Notification::send(Auth::user(), new Postnotification());
        
        $data = posts::where('user_id',auth()->id())->orderBy('id','desc')->get();
        
        return view('post',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::orderBy('id','desc')->get();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required|max:255',
        // ]);

        // $post = new posts();
        // $post->name = $request->name;
        // $post->description = $request->description;

        // $post->save();

        $validated = $request -> validated();
        $post = posts::create($validated + ['user_id'=>Auth::user()->id]);

        // Mail::to('chan@gmail.com')->send(new PostStored($post));
        // Mail::to('chan@gmail.com')->send(new PostCreated());
        event(new PostCreateEvent($post));

        return redirect('/post')->with('status', config('ma.massage.name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(posts $post)
    {   
        // if($post->user_id != auth()->id()){
        //     abort(403);
        // }
        $this->authorize('view',$post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(posts $post)
    {
        // if($post->user_id != auth()->id()){
        //     abort(403);
        // }
        $this->authorize('view',$post);
        $category = category::orderBy('id','desc')->get();
        return view('edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, posts $post)
    {
        // $request->validate([
        //     'name' => 'required|unique:posts|max:255',
        //     'description' => 'required|max:255',
        // ]);
        
        // $post->name = $request->name;
        // $post->description = $request->description;

        // $post->save();
        $validated = $request -> validated();
        $post -> update($validated + ['user_id'=>Auth::user()->id]);

        return redirect('/post')->with('upstate','Update sussessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(posts $post)
    {
        $post->delete();
        return redirect('/post');
    }
}
