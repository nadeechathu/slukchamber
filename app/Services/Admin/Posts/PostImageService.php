<?php

namespace App\Services\Admin\Posts;

//models
use App\Models\PostImage;

//interfaces
use App\Interfaces\Admin\Posts\PostImageInterface;

class PostImageService implements PostImageInterface
{

    /**
     * Store a newly created post image in storage.
     */
    public function create($postId, $bannerImage)
    {

        //check whether user upload post image, if yes save banner_image
        $postImage = null;

        if ($bannerImage != null) {

            $imageName = 'image_' . time() . '.' . $bannerImage->extension();

            $bannerImage->move(public_path('images/uploads/posts/images/'), $imageName);
            $bannerPath = 'images/uploads/posts/images/' . $imageName;

            $postImage = new PostImage();

            $postImage->post_id = $postId;
            $postImage->banner_image = $bannerPath;
            $postImage->type = 0;
            $postImage->status = 1;
            $postImage->save();
        }

        return $postImage;
    }

    /**
     * Update post image in storage.
     */
    public function update($postId, $bannerImage)
    {

        //check whether user upload post image, if yes save banner_image
        $savedPostImage = null;

        if ($bannerImage != null) {

            $imageName = 'image_' . time() . '.' . $bannerImage->extension();

            $bannerImage->move(public_path('images/uploads/posts/images/'), $imageName);
            $banner_image = 'images/uploads/posts/images/' . $imageName;

            $postImage = PostImage::where('post_id', $postId)->get()->first();

            if ($postImage == null) {

                //create a new one if the post image does not exists
                $postImage = new PostImage();
            }

            $postImage->post_id = $postId;
            $postImage->banner_image = $banner_image;
            $postImage->type = 0;
            $postImage->status = 1;

            $postImage->save();
        }

        return $savedPostImage;
    }
}
