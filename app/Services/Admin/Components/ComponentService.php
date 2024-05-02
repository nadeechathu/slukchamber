<?php

namespace App\Services\Admin\Components;

//requests
use App\Http\Requests\Admin\Components\CreateComponentRequest;
use App\Http\Requests\Admin\Components\UpdateComponentRequest;

use App\Models\Element;
use Illuminate\Http\Request;

//models
use App\Models\Component;

//interfaces
use App\Interfaces\Admin\Components\ComponentInterface;
use App\Models\Utilities;

class ComponentService implements ComponentInterface
{

    /**
     * Display a listing of components.
     */
    public function index(Request $request)
    {
        $components = Component::getAllComponentsForFilters($request);
        $components->appends(request()->query())->links();

        return $components;
    }

    /**
     * Show the form for creating a new component.
     */
    public function createUi()
    {
        $elements = Element::all();
        return $elements;

    }

    /**
     * Store a newly created component in storage.
     */
    public function create(CreateComponentRequest $request)
    {
        $component = new Component();

        $component->name = $request->name;
        $component->status = $request->status;
        $component->component_name_id = $request->component_name_id;
        $component->layout_image = $this->uploadComponentImage($request->layout_image);
        $component->save();

        $component->elements()->attach($request->element_ids);

        return $component;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $component = Component::find($id);

        return $component;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComponentRequest $request, $id)
    {
        $component = Component::find($id);

        $component->name = $request->name;
        $component->status = $request->status;
        $component->component_name_id = $request->component_name_id;

        if($request->layout_image != null){

            $component->layout_image = $this->uploadComponentImage($request->layout_image);
        }

        $component->save();

        $component->elements()->detach();
        $component->elements()->attach($request->selectedOptions);

        return $component;
    }

    /**
     * Display the specified resource.
     */
    public function viewComponentById($id)
    {
        $component = Component::where('id', $id)->first();

        return $component;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $component = Component::find($id);
        $component->elements()->detach();

        //removing file from the server
        Utilities::removeFileFromThePath($component->layout_image);

        $deletedCount = Component::where('id', '=', $id)->delete();

        return $deletedCount;

    }

    /**
     * Uploads component image and return the url
     */
    public function uploadComponentImage($image){

        //check whether user has uploaded image, if yes save image
        $imagePath = null;

        if ($image != null) {

            $imageName = 'component_image_' . time() . '.' . $image->extension();

            $image->move(public_path('images/uploads/components/images/'), $imageName);
            $imagePath = 'images/uploads/components/images/' . $imageName;

            
        }

        return $imagePath;

    }
}
