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
}
