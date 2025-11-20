<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function getPosts(){
        return app(TryService::class)(function (){
            return Post::where('is_active', 1)->get();
        });
    }

    public function addPost($post)
    {
        return app(TryService::class)(function () use ($post){
            return Post::create($post);
        });
    }

    public function showPost(Post $post)
    {
        return app(TryService::class)(function () use ($post){
            return $post;
        });
    }
    public function UpdatePost(Post $post,$request){
        return app(TryService::class)(function () use ($post,$request){
            $post->update($request);
            return $post;
        });
    }
}
