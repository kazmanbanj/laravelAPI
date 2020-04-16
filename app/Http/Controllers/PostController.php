<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as PostResources;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::all();
        // return response()->json(["data"=>$posts, "author" => "Banjoko"]);    //to return alogside additional details

        // $posts = Post::all();    //you can use this or paginate to separate the users posts
        $posts = Post::paginate(1);

        return new PostResources($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ['required','min:4','unique'],
            "body" => ['required','min:4','unique']
        ]);            //to validate data entry, use this

        // return $request;
        // Post::create($request->all());
        Post::create($data);

        return response()->json(["Message"=>"Record created successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return $post;
        return new PostResources($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $UpdatedData = $post->update($request->all());

        return response()->json(["data" => "Record Updated"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(["data" => "Record Deleted!!!"], 200);

    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function restore(Post $post, $id)
     {
        //  $post->restore();
        $data = Post::withTrashed()->find($id);

        $data->restore();
 
         return response()->json(["data" => "Record Restored!!!"], 200);
 
     }
}
