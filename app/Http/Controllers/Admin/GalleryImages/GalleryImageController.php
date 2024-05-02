<?php

namespace app\Http\Controllers\Admin\GalleryImages;

use App\Enums\CategoryTypesEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\GalleryImages\CreateGalleryImageRequest;
use App\Http\Requests\Admin\GalleryImages\UpdateGalleryImageRequest;

//interfaces
use App\Interfaces\Admin\GalleryImages\GalleryImageInterface;

//models
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Auth;

class GalleryImageController extends Controller
{
    private GalleryImageInterface $galleryImageInterface;

    //Used services
    public function __construct(GalleryImageInterface $galleryImageInterface)
    {
        $this->middleware('auth');
        $this->galleryImageInterface = $galleryImageInterface;
    }

    /**
     * Display a listing of galleryImages.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-gallery-images')) {

                $searchKey = $request->searchKey;

                $gallery_images = $this->galleryImageInterface->index($request);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.gallery_images.all_gallery_images', compact('gallery_images','searchKey','statuses'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new galleryImage.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-gallery-images')) {

            $galleryImage = $this->galleryImageInterface->createUi();

            $statuses = StatusEnum::cases(); //Active statuses

            return view('admin.gallery_images.components.create_gallery_image', compact('galleryImage','statuses'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created galleryImage in storage.
     */
    public function create(CreateGalleryImageRequest $request)
    {

        try {
            if (Auth::user()->can('create-gallery-images')) {
                DB::beginTransaction();

                //creating galleryImage
                $galleryImage = $this->galleryImageInterface->create($request);

                DB::commit();

                return redirect()->route('admin.gallery-images.all')->with('success', 'Gallery Image created successfully !');

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
            if (Auth::user()->can('edit-gallery-images')) {

                $gallery_image = $this->galleryImageInterface->updateUi($id);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.gallery_images.components.edit_gallery_image', compact('gallery_image','statuses'));

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
    public function update(UpdateGalleryImageRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-gallery-images')) {

                DB::beginTransaction();

                //updating galleryImage
                $galleryImage = $this->galleryImageInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.gallery-images.all')->with('success', 'Gallery Image updated successfully !');

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
    public function viewGalleryImageById($id)
    {
        try {
            if (Auth::user()->can('view-gallery-images-by-id')) {
                //retrieving galleryImage by id
                $galleryImage = $this->galleryImageInterface->viewGalleryImageById($id);

                return view('admin.gallery_images.gallery_image_single', compact('galleryImage'));

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
    public function destroy($id)
    {
        try {
            if (Auth::user()->can('delete-gallery-images')) {
                DB::beginTransaction();

                $galleryImage = $this->galleryImageInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.gallery-images.all')->with('success', 'GalleryImage deleted successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
