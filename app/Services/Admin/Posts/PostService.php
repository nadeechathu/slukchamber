<?php

namespace App\Services\Admin\Posts;

//requests
use App\Http\Requests\Admin\Posts\CreatePostRequest;
use App\Http\Requests\Admin\Posts\UpdatePostRequest;

use Illuminate\Http\Request;

//models
use App\Models\Post;
use App\Models\Category;

//interfaces
use App\Interfaces\Admin\Posts\PostInterface;
use App\Models\Utilities;

class PostService implements PostInterface
{

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {

        $posts = Post::getAllPostsForFilters($request);

        $posts->appends(request()->query())->links();
        return $posts;
    }

    /**
     * Show the form for creating a new post.
     */
    public function createUi()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');

        return $categories;

    }

    /**
     * Store a newly created post in storage.
     */
    public function create(CreatePostRequest $request)
    {

        $post = new Post();

        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->slug = $request->slug;
        $post->published_date = $request->published_date;
        $post->time = $request->time;
        $post->location = $request->location;
        $post->status = $request->status;
        $post->is_featured = $request->is_featured;
        $post->save();

        $post->categories()->attach($request->selectedOptions);

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $post = Post::with('postImages','categories')->where('id', $id)->get()->first();

        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->slug = $request->slug;
        $post->published_date = $request->published_date;
        $post->time = $request->time;
        $post->location = $request->location;
        $post->status = $request->status;
        $post->is_featured = $request->is_featured;
        $post->save();
        $post->categories()->detach($post->categories->pluck('id'));
        foreach ($request->selectedOptions as $key => $value) {
            $post->categories()->attach($value);

        }

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function viewPostBySlug($slug)
    {

        $post = Post::where('slug', $slug)->first();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {

        $post = Post::with('postImages')->where('slug', $slug)->first();
        $post->categories()->detach();
        $deletedCount = Post::where('slug', '=', $slug)->delete();

        foreach($post->postImages as $postImage){

            //removing file from the server
            Utilities::removeFileFromThePath($postImage->banner_image);
        }

        return $deletedCount;

    }
}
