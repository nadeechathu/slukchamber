<?php

namespace App\Services\Admin\Services;

//requests
use App\Http\Requests\Admin\Service\CreateServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use Illuminate\Http\Request;

//models
use App\Models\Service;

//interfaces
use App\Interfaces\Admin\Services\ServicesInterface;
use App\Models\Utilities;

class ServicesService implements ServicesInterface
{

    /**
     * Display a listing of services.
     */
    public function index(Request $request)
    {

        $services = Service::getAllServicesForFilters($request);

        return $services;
    }

    /**
     * Show the form for creating a new services.
     */
    public function createUi()
    {


    }

    /**
     * Store a newly created service in storage.
     */
    public function create(CreateServiceRequest $request)
    {

        $service = new Service();

        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->slug = $request->slug;
        $service->meta_description = $request->meta_description;
        $service->meta_title = $request->meta_title;
        $service->keywords = $request->keywords;
        $service->canonical_url = $request->canonical_url;
        $service->status = $request->status;
        $service->save();


        return $service;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $service = Service::find($id);

        return $service;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, $id)
    {
        $service = Service::find($id);

        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->description = $request->description;
        $service->slug = $request->slug;
        $service->meta_description = $request->meta_description;
        $service->meta_title = $request->meta_title;
        $service->keywords = $request->keywords;
        $service->canonical_url = $request->canonical_url;
        $service->status = $request->status;
        $service->save();

        return $service;
    }

    /**
     * Display the specified resource.
     */
    public function viewServiceBySlug($slug)
    {

        $service = Service::where('slug', $slug)->first();

        return $service;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {

        $service = Service::where('slug', '=', $slug)->with('service_images')->get()->first();

        //removing file from the server
        Utilities::removeFileFromThePath($service->service_images->banner_image);

        $deletedCount = Service::where('slug', '=', $slug)->delete();

        return $deletedCount;

    }
}
