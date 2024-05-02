<?php

namespace App\Services\Admin\GalleryImages;

//requests
use App\Http\Requests\Admin\GalleryImages\CreateGalleryImageRequest;
use App\Http\Requests\Admin\GalleryImages\UpdateGalleryImageRequest;

use App\Models\Component;
use Illuminate\Http\Request;

//models
use App\Models\GalleryImage;

//interfaces
use App\Interfaces\Admin\GalleryImages\GalleryImageInterface;

class GalleryImageService implements GalleryImageInterface
{

    /**
     * Display a listing of galleryImages.
     */
    public function index(Request $request)
    {
//        $galleryImages = GalleryImage::getAllGalleryImagesForFilters($request);
//        $galleryImages->appends(request()->query())->links();

        $galleryImages = GalleryImage::all();
        return $galleryImages;
    }

    /**
     * Show the form for creating a new galleryImage.
     */
    public function createUi()
    {

    }

    /**
     * Store a newly created galleryImage in storage.
     */
    public function create(CreateGalleryImageRequest $request)
    {

        $imageCollection = array();
        $images_set = $request->files;
        $count = 0;
        if (!empty($images_set)){
            foreach ($images_set as $image_set){
                foreach ($image_set as $image) {

                    $count++;
                    $imageName = 'image_' . time() . '.' . $count.'_'.$image->getClientOriginalExtension();

                    $image->move(public_path('images/uploads/gallery_images/images/'), $imageName);
                    $image_src = 'images/uploads/gallery_images/images/' . $imageName;
//                    dd($image_set, $image_src, $count);
                    $galleryImage = new GalleryImage();

                    $galleryImage->image_src = $image_src;
                    $galleryImage->alt_text = $request->alt_text;
                    $galleryImage->caption = $request->caption;

                    $galleryImage->save();
                    $galleryImage->image_src = null;
                    array_push($imageCollection, $galleryImage);
                }
            }
        }

        return $imageCollection;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $galleryImage = GalleryImage::find($id);

        return $galleryImage;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $galleryImage = GalleryImage::find($id);

        $image_src = $request->image_src;

        if ($galleryImage != null) {

            $imageName = 'image_' . time() . '.' .'0'.'_'.$image_src->extension();

            $image_src->move(public_path('images/uploads/gallery_images/images/'), $imageName);
            $image_src = 'images/uploads/gallery_images/images/' . $imageName;

            $galleryImage->image_src = $image_src;

        }

        $galleryImage->alt_text = $request->alt_text;
        $galleryImage->caption = $request->caption;
        $galleryImage->save();

        return $galleryImage;
    }

    /**
     * Display the specified resource.
     */
    public function viewGalleryImageById($id)
    {
        $galleryImage = GalleryImage::where('id', $id)->first();

        return $galleryImage;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deletedCount = GalleryImage::where('id', $id)->delete();

        return $deletedCount;
    }
}
