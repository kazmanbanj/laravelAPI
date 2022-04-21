<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        // return response()->json(["data"=>$posts, "author" => "Banjoko"]);    //to return alogside additional details

        return (new PostResource($posts))->response()->setStatusCode(200);
    }

    public function create()
    {
        //
    }

    public function store(PostRequest $request)
    {
        Post::create($request->all());

        return response()->json(["Message"=>"Record created successfully"], 201);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        $UpdatedData = $post->update($request->all());

        return response()->json(["data" => "Record Updated"], 200);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(["data" => "Record Deleted!!!"], 200);
    }

    public function permanentDestroy(Post $post)
    {
        $post->delete();
        $post->onlyTrashed()->forceDelete();

        return response()->json(["data" => "Record Permanently Deleted!!!"], 200);
    }

    public function restore(Post $post, $id)
    {
        $data = Post::withTrashed()->find($id);

        $data->restore();

        return response()->json(["data" => "Record Restored!!!"], 200);
    }

    public function permanentDestroySoftDeleted(Post $post)
    {
        $post->onlyTrashed()->forceDelete();
    
        return response()->json(["data" => "Record Permanently Deleted!!!"], 200);
    }
}
