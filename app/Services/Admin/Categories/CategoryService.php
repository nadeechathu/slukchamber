<?php

namespace App\Services\Admin\Categories;

//requests
use App\Http\Requests\Admin\Posts\CreateCategoryRequest;
use App\Http\Requests\Admin\Posts\UpdateCategoryRequest;

use Illuminate\Http\Request;

//models
use App\Models\Category;
use App\Models\Utilities\Utilities;

//interfaces
use App\Interfaces\Admin\Categories\CategoryInterface;

class CategoryService implements CategoryInterface
{

    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        $categories = Category::getAllCategoriesForFilters($request);
        $categories->appends(request()->query())->links();

        return $categories;
    }

    /**
     * Show the form for creating a new category.
     */
    public function createUi()
    {
        return view('admin.categories.components.create_category');

    }

    /**
     * Store a newly created category in storage.
     */
    public function create(CreateCategoryRequest $request)
    {
        
        $category = new Category();

        $category->name = $request->name;
        $category->short_description = $request->short_description;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->canonical_url = $request->canonical_url;
        // $category->type = $request->type;
        $category->type = $request->type_id;
        $category->save();
        
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $category = Category::with('categoryImages')->where('id',$id)->first();

        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->short_description = $request->short_description;
        $category->description = $request->description;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->canonical_url = $request->canonical_url;
        $category->type =$request->type_id;
        $category->save();

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function viewCategoryById($id)
    {

        $category = Category::where('id', $id)->first();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $category = Category::with('categoryImages')->where('id', '=', $id)->get()->first();
        $deletedCount = Category::where('id', '=', $id)->delete();

        //removing images from the server
        foreach($category->categoryImages as $image){

            Utilities::removeFileFromThePath($image->banner_image);
        }

        return $deletedCount;

    }

    /**
     * Get all post categories
     */
    public function getCategoriesByType($type){

        $categories = Category::with('categoryImages')->where('type',$type)->where('status',1)->get();

        return $categories;
    }
}
