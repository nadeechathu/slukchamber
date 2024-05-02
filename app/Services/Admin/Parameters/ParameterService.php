<?php

namespace App\Services\Admin\Parameters;


use Illuminate\Support\Facades\Hash;
use App\Enums\StatusEnum;
//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Parameters\CreateParameterRequest;
use App\Http\Requests\Admin\Parameters\UpdateParameterRequest;

//models
use App\Models\Parameter;


//interfaces
use App\Interfaces\Admin\Parameters\ParameterInterface;

class ParameterService implements ParameterInterface
{

    /**
     * Display a listing of parameters.
     */
    public function index(Request $request)
    {

        $parameters = Parameter::getParametersForFilters($request);
        $parameters->appends(request()->query())->links();

        return $parameters;
    }

    /**
     * Show the form for creating a new parameter.
     */
    public function createUi()
    {
        $statuses = StatusEnum::cases(); //Active statuses
        $parameters = Parameter::where('status', 1)->pluck('name', 'id');
        return view('admin.Parameters.create_parameter',compact('parameters','statuses'));

    }

    /**
     * Store a newly created parameter in storage.
     */
    public function create(CreateParameterRequest $request)
    {

        $parameter = new Parameter();

        $parameter->name = $request->name;
        $parameter->content = $request->content;
        $parameter->link = $request->link;
        $parameter->status = $request->status;
        $parameter->parent_id = $request->parent_id;
        $parameter->main_heading = $request->main_heading;
        $parameter->sub_heading = $request->sub_heading;

        if ($request->hasFile('image_src')) {

            $imageName = 'image_' . time() . '.' . $request->file('image_src')->extension();

            $request->file('image_src')->move(public_path('images/uploads/parameters/images/'), $imageName);
            $banner_image = 'images/uploads/parameters/images/' . $imageName;
            $parameter->image_src = $banner_image;
        }

        $parameter->save();

        return $parameter;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $parameter = Parameter::find($id);

        return $parameter;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateParameterRequest $request, $id)
    {

        $parameter = Parameter::find($id);

        $parameter->name = $request->name;
        $parameter->content = $request->content;
        $parameter->link = $request->link;
        $parameter->status = $request->status;
        $parameter->parent_id = $request->parent_id;
        $parameter->main_heading = $request->main_heading;
        $parameter->sub_heading = $request->sub_heading;

        
        if ($request->hasFile('image_src')) {

            $imageName = 'image_' . time() . '.' . $request->file('image_src')->extension();

            $request->file('image_src')->move(public_path('images/uploads/parameters/images/'), $imageName);
            $banner_image = 'images/uploads/parameters/images/' . $imageName;
            $parameter->image_src = $banner_image;
        }

        $parameter->save();

        return $parameter;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = Parameter::where('id', $id)->delete();

        return $deletedCount;

    }
}
