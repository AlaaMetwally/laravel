<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use App\Http\Requests\StoreBlogPost;
class PostsController extends Controller
{
    public function index(){
        $posts = Post::with(['user'])->paginate(3);
        return PostResource::collection($posts);
    }
     public function store(StoreBlogPost $request)
    {
        $post = Post::create($request->all());
        return new PostResource($post);
    }
  public function destroy(){
    return Socialite::driver('github')->stateless()->user();
  }
}
