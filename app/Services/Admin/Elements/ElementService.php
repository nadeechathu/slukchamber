<?php

namespace App\Services\Admin\Elements;

use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Elements\CreateElementRequest;
use App\Http\Requests\Admin\Elements\UpdateElementRequest;

//models
use App\Models\Element;
use App\Models\Parameter;

//interfaces
use App\Interfaces\Admin\Elements\ElementInterface;

class ElementService implements ElementInterface
{

    /**
     * Display a listing of elements.
     */
    public function index(Request $request)
    {

        $elements = Element::getElementsForFilters($request);
        $elements->appends(request()->query())->links();

        return $elements;
    }
   /**
     * Show the form for creating a new element.
     */
    public function createUi()
    {

        $parameters = Parameter::where('status', 1)->pluck('name', 'id');

        return $parameters;
    }


    /**
     * Store a newly created element in storage.
     */
    public function create(CreateElementRequest  $request)
    {

        $element = new Element();

        $element->element_name = $request->element_name;
        $element->mapped_with = $request->mapped_with;
        $element->status = $request->status;
        $element->save();

        if($request->selectedOptions != null){

            foreach ($request->selectedOptions as $key => $value) {
                $element->parameters()->attach($value);

            }
        }

        return $element;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $element = Element::find($id);

        return $element;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElementRequest $request, $id)
    {

        $element = Element::find($id);

        $element->element_name = $request->element_name;
        $element->mapped_with = $request->mapped_with;
        $element->status = $request->status;
        $element->save();

        $element->parameters()->detach($element->parameters->pluck('id'));

        if($request->selectedOptions != null){

            foreach ($request->selectedOptions as $key => $value) {
                $element->parameters()->attach($value);
            }
        }
        return $element;



    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = Element::where('id', $id)->delete();

        return $deletedCount;

    }
}

