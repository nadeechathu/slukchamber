<?php

namespace App\Services\Admin\Components;

//requests
use App\Interfaces\Admin\Components\ComponentHasElementInterface;
use App\Models\Element;
use Illuminate\Http\Request;

//models
use App\Models\Component;
use App\Models\ComponentHasElement;

class ComponentHasElementsService implements ComponentHasElementInterface
{

    /**
     * Display a listing of components.
     */
    public function index()
    {
        $components = ComponentHasElement::with('component', 'element')->get();
        return $components;
    }

    /**
     * Store a newly created component in storage.
     */
    public function create(Request $request)
    {
        $component = new ComponentHasElement();

        $component->componenet_id = $request->componenet_id;
        $component->post_id = $request->post_id;
        $component->save();

        return $component;
    }

    /**
     * Display the specified resource.
     */
    public function viewComponentByElement($id)
    {

        $component = Element::where('id', $id)->with('components')->first();

        return $component;
    }

    /**
     * Display the specified resource.
     */
    public function viewElementByComponent($id)
    {

        $deletedCount = Component::where('id', '=', $id)->with('elements')->first();

        return $deletedCount;

    }
}
