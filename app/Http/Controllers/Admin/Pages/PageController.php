<?php

namespace app\Http\Controllers\Admin\Pages;

use App\Models\Page;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Interfaces\Admin\Pages\PageInterface;
use App\Http\Requests\Admin\Pages\CreatePageRequest;
use App\Http\Requests\Admin\Pages\UpdatePageRequest;
use App\Interfaces\Admin\Pages\PageHasComponentInterface;

class PageController extends Controller
{
    private PageInterface $pageInterface;
    private PageHasComponentInterface $pageHasComponentInterface;

    //Used interfaces
    public function __construct(PageInterface $pageInterface, PageHasComponentInterface $pageHasComponentInterface)
    {
        $this->middleware('auth');
        $this->pageInterface = $pageInterface;
        $this->pageHasComponentInterface = $pageHasComponentInterface;
    }

    /**
     * Display a listing of pages.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-pages')) {
                $searchKey = $request->searchKey;
                $pages = $this->pageInterface->index($request);

                return view('admin.pages.all_pages', compact('pages','searchKey'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new page.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-pages')) {
            $components = Component::all();
            return view('admin.pages.components.create_page', compact('components'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created page in storage.
     */
    public function create(CreatePageRequest $request)
    {

        try {
            if (Auth::user()->can('create-pages')) {
                DB::beginTransaction();

                //creating page
                $page = $this->pageInterface->create($request);

                //create page has components
                $pageHasComponent = $this->pageHasComponentInterface->create($page->id,$request);


                DB::commit();

                return redirect()->route('admin.pages.all')->with('success', 'Page created successfully !');
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
            if (Auth::user()->can('edit-pages')) {
                $pages = Page::where('status', 1)->pluck('title', 'id');
                $page = Page::find($id);
                $components = Component::all();
                return view('admin.pages.components.edit_page', compact('page','pages', 'components'));
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
    public function update(UpdatePageRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-pages')) {
                DB::beginTransaction();

                //updating page
                $page = $this->pageInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.pages.all')->with('success', 'Page updated successfully !');
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
    public function viewPageById($id)
    {
        try {
            if (Auth::user()->can('view-by-component')) {
                //retrieving page by id
                $page = $this->pageInterface->viewPageById($id);

                return view('admin.pages.pages.page_single', compact('page'));
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
            if (Auth::user()->can('delete-pages')) {
                DB::beginTransaction();

                $page = $this->pageInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.pages.all')->with('success', 'Page deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}

