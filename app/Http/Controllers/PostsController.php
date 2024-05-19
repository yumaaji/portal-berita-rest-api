<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostsController extends Controller
{
    public function index (){
        $post = Post::all();

        // return response()->json(['data' => $post]);
        return PostResource::collection($post);
    }
    
    public function show($id){

        $post = Post::with('writer:id,username')->findOrFail($id);

        return new PostDetailResource($post);
    }

    // with eager loading
    public function show2($id){

        $post = Post::findOrFail($id);

        return new PostDetailResource($post);
    }

    
}
