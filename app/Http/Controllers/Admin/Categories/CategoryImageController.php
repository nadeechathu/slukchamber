<?php

namespace app\Http\Controllers\Admin\Categories;

use App\Http\Controllers\admin\Posts\DB;
use App\Http\Controllers\Controller;

//interfaces
use App\Interfaces\Admin\Categories\CategoryImageInterface;

class CategoryImageController extends Controller
{
    private CategoryImageInterface $categoryImageInterface;
    //Used services
    public function __construct( CategoryImageInterface $categoryImageInterface)
    {
        $this->middleware('auth');
        $this->categoryImageInterface = $categoryImageInterface;
    }

    /**
     * Store a newly created category image in storage.
     */
    public function create($categoryId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //creating category image
            $savedCategoryImage = $this->categoryImageInterface->create($categoryId, $bannerImage);

            DB::commit();

            return $savedCategoryImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update category image in storage.
     */
    public function update($categoryId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //updating category image
            $savedCategoryImage = $this->categoryImageInterface->update($categoryId, $bannerImage);

            DB::commit();

            return $savedCategoryImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }
}
