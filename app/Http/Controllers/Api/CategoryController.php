<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\ApiResponseBuilder;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(public CategoryService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->getCategories();
        return (new ApiResponseBuilder())->data(CategoryResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $result=$this->service->addCategory($request->validated());
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Category created successfully."):
            (new ApiResponseBuilder())->message("Unable to create category.");
        return $actionResult->data(new CategoryResource($result->data))->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $result=$this->service->showCategory($category);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Category retrieved successfully."):
            (new ApiResponseBuilder())->message("Unable to retrieve category.");
        return $actionResult->data(new CategoryResource($result->data))->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $result=$this->service->updateCategory($category,$request->all());
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Category updated successfully."):
            (new ApiResponseBuilder())->message("Unable to update category.");
        return $actionResult->data(new CategoryResource($result->data))->response();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $result=$this->service->deleteCategory($category);
        $actionResult=$result->success?
            (new ApiResponseBuilder())->message("Category deleted successfully."):
            (new ApiResponseBuilder())->message("Unable to delete category.");
        return $actionResult->response();
    }
}
