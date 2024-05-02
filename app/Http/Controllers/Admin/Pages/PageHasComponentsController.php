<?php

namespace app\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;

use App\Interfaces\Admin\Pages\PageHasComponentInterface;
use App\Models\Page;
use App\Models\PageHasComponent;
use App\Models\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageHasComponentsController extends Controller
{
    private PageHasComponentInterface $pageHasComponentInterface;

    //Used interfaces
    public function __construct(PageHasComponentInterface $pageHasComponentInterface)
    {
        $this->middleware('auth');
        $this->pageHasComponentInterface = $pageHasComponentInterface;
    }

    /**
     * Display a listing of page has components.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-page-components')) {
                $searchKey = $request->searchKey;
                $pages = $this->pageHasComponentInterface->index($request);

                return view('admin.pages.all_pages', compact('pages','searchKey'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new page has component.
     */
    public function createUi($id)
    {
        if (Auth::user()->can('create-page-components')) {
            $components = Component::all();
            return view('admin.pages.components.add_components', compact('components', 'id'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created page has component in storage.
     */
    public function create($id, Request $request)
    {
        try {
            if (Auth::user()->can('create-page-components')) {
                DB::beginTransaction();

                //creating page
                $page = $this->pageHasComponentInterface->create($id,$request);

                DB::commit();

                return back()->with('success', 'Page created successfully !');
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
            if (Auth::user()->can('edit-page-components')) {
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
    public function update(Request $request, $id)
    {
        try {
            if (Auth::user()->can('edit-page-components')) {
                DB::beginTransaction();

                //updating page
                $page = $this->pageHasComponentInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.page-has-components.viewComponentByPage')->with('success', 'Page updated successfully !');
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
    public function viewPageByComponentUi($id)
    {

        try {
            if (Auth::user()->can('view-page-components')) {
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
     * Display the specified resource.
     */
    public function viewComponentsForPage($id)
    {
        try {
            if (Auth::user()->can('view-page-components')) {

                //retrieving page by id
                $page_has_components = $this->pageHasComponentInterface->viewComponentByPage($id);

                $page = Page::where('id',$id)->get()->first();

                $pageComponentIds = $page->components()->pluck('id')->toArray();

                $all_components = Component::whereNotIn('id',$pageComponentIds)->get();


                return view('admin.pages.components.view_component_by_page', compact('page_has_components', 'all_components','page'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Add sort order
     */
    public function UpdateSortOrder($page_id, Request $request)
    {
        try {
            if (Auth::user()->can('update-components-sort-order')) {
                DB::beginTransaction();

                $page = $this->pageHasComponentInterface->UpdateSortOrder($page_id, $request);

                DB::commit();

                return back()->with('success', 'Update components sort order successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($page_id, $component_id)
    {
        try {
            if (Auth::user()->can('delete-page-components')) {
                DB::beginTransaction();

                $page = $this->pageHasComponentInterface->destroy($page_id, $component_id);

                DB::commit();

                return back()->with('success', 'Remove component from page successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}

