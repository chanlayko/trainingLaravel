<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

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
        $data = posts::orderBy('id','desc')->get();
        
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
        posts::create($validated);

        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(posts $post)
    {
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
        $post -> update($validated);

        return redirect('/post');
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
