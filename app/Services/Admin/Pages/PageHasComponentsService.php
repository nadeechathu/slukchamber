<?php

namespace App\Services\Admin\Pages;

//interfaces
use App\Interfaces\Admin\Pages\PageHasComponentInterface;

//requests
use App\Models\ComponentHasElement;
use Illuminate\Http\Request;

//models
use App\Models\Page;
use App\Models\Component;
use App\Models\PageHasComponent;

class PageHasComponentsService implements PageHasComponentInterface
{

    /**
     * Display a listing of page has components.
     */
    public function index()
    {
        $pageComponents = PageHasComponent::with('page', 'component')->get();
        return $pageComponents;
    }

    /**
     * Show the form for creating a new page.
     */
    public function createui($id)
    {
        $components = Component::all();
        return $components;

    }

    /**
     * Store a newly created pageComponent in storage.
     */
    public function create($id, Request $request)
    {
//        foreach ($request->component_ids as $component_id){
//            $pageComponent = new PageHasComponent();
//
//            $pageComponent->page_id = $request->page_id;
//            $pageComponent->component_id = $component_id;
//            $pageComponent->sort_order = $request->sort_order;
//            $pageComponent->status = $request->status;
//            $pageComponent->save();
//
//            return $pageComponent;
//        }
        $page = Page::where('id',$id)->first();
        foreach ($request->selectedComponents as $selectedComponent){

            if(!$page->components->contains($selectedComponent)){
                $page->components()->attach($selectedComponent);
            }
        }


        return $page;

    }

//    /**
//     * Store a updated pageComponent in storage.
//     */
//    public function update(Request $request)
//    {
//        $pageComponent =
//        foreach ($request->component_ids as $component_id){
//
//            $pageComponent->page_id = $request->page_id;
//            $pageComponent->component_id = $component_id;
//            $pageComponent->sort_order = $request->sort_order;
//            $pageComponent->status = $request->status;
//            $pageComponent->save();
//
//            return $pageComponent;
//        }
//
//    }

    /**
     * Display the specified resource.
     */
    public function viewPageByComponent($id)
    {
        $pageComponent = Component::where('id', $id)->with('pages')->get();

        return $pageComponent;
    }

    /**
     * Display the specified resource.
     */
    public function viewComponentByPage($id)
    {
        $page = Page::where('id', $id)->with('components')->get()->first();

        return $page;
    }

    /**
     * Update components sort order.
     */
    public function UpdateSortOrder($page_id, Request $request)
    {
        foreach ($request->sortOrder as $key=>$component_id){
           $page = PageHasComponent::where('page_id',$page_id)->where('component_id', $component_id)->update(['sort_order' => ($key+1)]);
        }

        return $page;
    }


    /**
     * Destroy the specified resource.
     */
    public function destroy($page_id, $component_id)
    {

        $page = Page::where('id',$page_id)->get()->first();
        $page->components()->detach($component_id);


        return $page;

    }
}
