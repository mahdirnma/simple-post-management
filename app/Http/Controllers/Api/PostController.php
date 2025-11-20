<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\ApiResponseBuilder;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(public PostService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = $this->service->getPosts();
        return (new ApiResponseBuilder())->data(PostResource::collection($results->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $result=$this->service->addPost($request->all());
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Post added successfully.'):
            (new ApiResponseBuilder())->message('Post added successfully fail.');
        return $actionResult->data(new PostResource($result->data))->response();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $result=$this->service->showPost($post);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Post showed successfully.'):
            (new ApiResponseBuilder())->message('Post showed successfully fail.');
        return $actionResult->data(new PostResource($result->data))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $result=$this->service->updatePost($post,$request->all());
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Post updated successfully.'):
            (new ApiResponseBuilder())->message('Post updated successfully fail.');
        return $actionResult->data(new PostResource($post))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $result=$this->service->deletePost($post);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Post deleted successfully.'):
            (new ApiResponseBuilder())->message('Post deleted successfully fail.');
        return $actionResult->response();
    }
}
