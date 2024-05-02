<?php

namespace app\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//interfaces
use App\Interfaces\Admin\Posts\PostImageInterface;

class PostImageController extends Controller
{

    private PostImageInterface $postImageInterface;
    //Used services
    public function __construct( PostImageInterface $postImageInterface)
    {
        $this->middleware('auth');
        $this->postImageInterface = $postImageInterface;
    }

    /**
     * Store a newly created post image in storage.
     */
    public function create($postId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //creating post image
            $savedPostImage = $this->postImageInterface->create($postId, $bannerImage);

            DB::commit();

            return $savedPostImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update post image in storage.
     */
    public function update($postId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //updating post image
            $savedPostImage = $this->postImageInterface->update($postId, $bannerImage);

            DB::commit();

            return $savedPostImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }
}
