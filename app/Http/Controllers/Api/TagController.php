<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Services\ApiResponseBuilder;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(public TagService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->getTags();
        return (new ApiResponseBuilder())->data(TagResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $result=$this->service->addTag($request->all());
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message('Tag added successfully.'):
            (new ApiResponseBuilder())->message('Error in adding tag.');
        return $actionResult->data(new TagResource($result->data))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
