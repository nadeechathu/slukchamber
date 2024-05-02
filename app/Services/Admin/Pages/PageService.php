<?php

namespace App\Services\Admin\Pages;

//requests
use App\Http\Requests\Admin\Pages\CreatePageRequest;
use App\Http\Requests\Admin\Pages\UpdatePageRequest;

use App\Models\Component;
use Illuminate\Http\Request;

//models
use App\Models\Page;

//interfaces
use App\Interfaces\Admin\Pages\PageInterface;

class PageService implements PageInterface
{

    /**
     * Display a listing of pages.
     */
    public function index(Request $request)
    {
        $pages = Page::getAllPagesForFilters($request);
        $pages->appends(request()->query())->links();

        return $pages;
    }

    /**
     * Show the form for creating a new page.
     */
    public function createUi()
    {
        $components = Component::all();
        return $components;

    }

    /**
     * Store a newly created page in storage.
     */
    public function create(CreatePageRequest $request)
    {
        $page = new Page();

        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->status = $request->status;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->canonical_url = $request->canonical_url;
        $page->keywords = $request->keywords;
        $page->save();


        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $page = Page::find($id);

        return $page;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = Page::find($id);

        $page->title = $request->title;
        $page->slug = $request->slug;
        $page->status = $request->status;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->canonical_url = $request->canonical_url;
        $page->keywords = $request->keywords;
        $page->save();


        return $page;
    }

    /**
     * Display the specified resource.
     */
    public function viewPageById($id)
    {
        $page = Page::where('id', $id)->first();

        return $page;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->components()->detach();

        $deletedCount = Page::where('id', '=', $id)->delete();

        return $deletedCount;

    }
}
