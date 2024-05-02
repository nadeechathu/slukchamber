<?php

namespace app\Http\Controllers\Admin\Posts;

use App\Enums\CategoryTypesEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\Posts\CreatePostRequest;
use App\Http\Requests\Admin\Posts\UpdatePostRequest;

//interfaces
use App\Interfaces\Admin\Posts\PostImageInterface;
use App\Interfaces\Admin\Posts\PostInterface;
use App\Interfaces\Admin\Categories\CategoryInterface;

//models
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private PostInterface $postInterface;
    private PostImageInterface $postImageInterface;
    private CategoryInterface $categoryInterface;

    //Used services
    public function __construct(PostInterface $postInterface, PostImageInterface $postImageInterface, CategoryInterface $categoryInterface)
    {
        $this->middleware('auth');
        $this->postInterface = $postInterface;
        $this->postImageInterface = $postImageInterface;
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-posts')) {

                $searchKey = $request->searchKey;

                $selectedDate = $request->selectedDate;

                $posts = $this->postInterface->index($request);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.posts.all_posts', compact('posts','searchKey', 'selectedDate','statuses'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new post.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-posts')) {

            $categories = $this->postInterface->createUi();

            $statuses = StatusEnum::cases(); //Active statuses

            return view('admin.posts.components.create_post', compact('categories','statuses'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created post in storage.
     */
    public function create(CreatePostRequest $request)
    {

        try {
            if (Auth::user()->can('create-posts')) {
                DB::beginTransaction();

                //creating post
                $post = $this->postInterface->create($request);

                //creating post image
                $postImage = $this->postImageInterface->create($post->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.posts.all')->with('success', 'Post created successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {

        try {
            if (Auth::user()->can('edit-posts')) {
                
                $post = $this->postInterface->updateUi($id);

                $categories = $this->categoryInterface->getCategoriesByType(CategoryTypesEnum::EVENTS);
                
                $statuses = StatusEnum::cases(); //Active statuses
                
                return view('admin.posts.components.edit_post', compact('post','categories','statuses'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-posts')) {

                DB::beginTransaction();

                //updating post
                $post = $this->postInterface->update($request, $id);

                //updating post image
                $postImage = $this->postImageInterface->update($post->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.posts.all')->with('success', 'Post updated successfully !');


            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function viewPostBySlug($slug)
    {
        try {
            if (Auth::user()->can('view-posts')) {
                //retrieving post by slug
                $post = $this->postInterface->viewPostBySlug($slug);

                return view('admin.posts.post_single', compact('post'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            if (Auth::user()->can('delete-posts')) {
            DB::beginTransaction();

            $post = $this->postInterface->destroy($slug);

            DB::commit();

            return redirect()->route('admin.posts.all')->with('success', 'Post deleted successfully !');

        } else {
            
            return view('admin.errors.403_forbidden');
        }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
