<?php

namespace app\Http\Controllers\Admin\Categories;

use App\Enums\CategoryTypesEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Posts\CreateCategoryRequest;
use App\Http\Requests\Admin\Posts\UpdateCategoryRequest;

//interfaces
use App\Interfaces\Admin\Categories\CategoryImageInterface;
use App\Interfaces\Admin\Categories\CategoryInterface;

//models
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private CategoryInterface $categoryInterface;
    private CategoryImageInterface $categoryImageInterface;

    //Used services
    public function __construct(CategoryInterface $categoryInterface, CategoryImageInterface $categoryImageInterface)
    {
        $this->middleware('auth');
        $this->categoryInterface = $categoryInterface;
        $this->categoryImageInterface = $categoryImageInterface;
    }

    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-categories')) {

                $searchKey = $request->searchKey;

                $categories = $this->categoryInterface->index($request);

                return view('admin.categories.viewall_categories', compact('categories', 'searchKey'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new category.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-categories')) {

            $categories = $this->categoryInterface->index(new Request());
            
            $statuses = StatusEnum::cases(); //Active statuses

            $categoryTypes = CategoryTypesEnum::cases();

            return view('admin.categories.components.create_category',compact('categories','statuses','categoryTypes'));

        } else {
            return view('admin.errors.403_forbidden');
        } 
    }

    /**
     * Store a newly created category in storage.
     */
    public function create(CreateCategoryRequest $request)
    {
        try {
            if (Auth::user()->can('create-categories')) {

                DB::beginTransaction();

                //creating category
                $category = $this->categoryInterface->create($request);

                //creating category image
                $categoryImage = $this->categoryImageInterface->create($category->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.categories.all')->with('success', 'Category created successfully !');

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
            if (Auth::user()->can('edit-categories')) {

                $category = $this->categoryInterface->updateUi($id);

                $categories = $this->categoryInterface->index(new Request(array()));

                $statuses = StatusEnum::cases(); //Active statuses

                $categoryTypes = CategoryTypesEnum::cases();

                return view('admin.categories.components.edit_category', compact('category','statuses','categories', 'categoryTypes'));

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
    public function update(UpdateCategoryRequest $request, $id)
    {
        try {

            if (Auth::user()->can('edit-categories')) {

                DB::beginTransaction();

                //updating category
                $category = $this->categoryInterface->update($request, $id);

                //updating category image
                $categoryImage = $this->categoryImageInterface->update($category->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.categories.all')->with('success', 'Category created successfully !');

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
    public function viewCategoryById($id)
    {
        try {

            if (Auth::user()->can('view-categories')) {

                //retrieving category by id
                $category = $this->categoryInterface->viewCategoryById($id);

                $statuses = StatusEnum::cases(); //Active statuses                

                return view('admin.categories.category_single', compact('category','statuses'));

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

            if (Auth::user()->can('delete-categories')) {

                DB::beginTransaction();

                $category = $this->categoryInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.categories.all')->with('success', 'Category deleted successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }

        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
