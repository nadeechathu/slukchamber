<?php

namespace App\Services\Admin\Categories;

//models
use App\Interfaces\Admin\Categories\CategoryImageInterface;
use App\Models\CategoryImage;

//interfaces

class CategoryImageService implements CategoryImageInterface
{

    /**
     * Store a newly created category image in storage.
     */
    public function create($categoryId, $bannerImage)
    {
        
        //check whether user upload category image, if yes save banner_image
        $categoryImage = null;

        if ($bannerImage != null) {

            $imageName = 'image_' . time() . '.' . $bannerImage->extension();

            $bannerImage->move(public_path('images/uploads/categories/images/'), $imageName);
            $banner_image = 'images/uploads/categories/images/' . $imageName;

            $categoryImage = new CategoryImage();

            $categoryImage->category_id = $categoryId;
            $categoryImage->banner_image = $banner_image;
            $categoryImage->type = 0;
            $categoryImage->status = 1;
            
            $categoryImage->save();
            
        }

        return $categoryImage;
    }

    /**
     * Update category image in storage.
     */
    public function update($categoryId, $bannerImage)
    {

        //check whether user upload category image, if yes save banner_image
        $savedCategoryImage = null;

        if ($bannerImage != null) {

            $imageName = 'image_' . time() . '.' . $bannerImage->extension();

            $bannerImage->move(public_path('images/uploads/categories/images/'), $imageName);
            $banner_image = 'images/uploads/categories/images/' . $imageName;

            $categoryImage = CategoryImage::where('category_id', $categoryId)->get()->first();

            if ($categoryImage == null) {

                //create a new one if the category image does not exists
                $categoryImage = new CategoryImage();
            }

            $categoryImage->category_id = $categoryId;
            $categoryImage->banner_image = $banner_image;
            $categoryImage->type = 0;
            $categoryImage->status = 1;

            $categoryImage->save();
        }

        return $savedCategoryImage;
    }
}
