<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = posts::all();
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
        return view('create');
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

        posts::create([
            'name' => $request ->name,
            'description' => $request->description,
        ]);

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
        dd($post->categories);

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
        return view('edit',compact('post'));
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

        $post -> update([
            'name'=>$request -> name,
            'description'=>$request->description,
        ]);

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
