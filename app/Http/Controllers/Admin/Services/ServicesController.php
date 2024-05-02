<?php

namespace app\Http\Controllers\Admin\Services;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Service\CreateServiceRequest;
use App\Http\Requests\Admin\Service\UpdateServiceRequest;
use Illuminate\Http\Request;


use App\Interfaces\Admin\Services\ServiceImageInterface;
use App\Interfaces\Admin\Services\ServicesInterface;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    private ServicesInterface $servicesInterface;
    private ServiceImageInterface $serviceImageInterface;

    //Used services
    public function __construct(ServicesInterface $servicesInterface, ServiceImageInterface $serviceImageInterface)
    {
        $this->middleware('auth');
        $this->servicesInterface = $servicesInterface;
        $this->serviceImageInterface = $serviceImageInterface;
    }

    /**
     * Display a listing of services.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-services')) {

                $services = $this->servicesInterface->index($request);
                $searchKey = $request->searchKey;

                // return  $services;
                return view('admin.services.all_services', compact('services','searchKey'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new service.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-services')) {

            $statuses = StatusEnum::cases(); //Active statuses
            
            return view('admin.services.components.create_service',compact('statuses'));

        } else {

            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created service in storage.
     */
    public function create(CreateServiceRequest $request)
    {

        try {
            if (Auth::user()->can('create-services')) {

                DB::beginTransaction();

                //creating service
                $service = $this->servicesInterface->create($request);

                //creating service image
                $postImage = $this->serviceImageInterface->create($service->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.services.all')->with('success', 'Service created successfully !');

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();
dd($exception);
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */




    public function updateUi($id)
    {
        try {
            if (Auth::user()->can('edit-services')) {

                $service = $this->servicesInterface->updateui($id);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.services.components.edit_service', compact('service','statuses'));

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
    public function update(UpdateServiceRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-services')) {

                DB::beginTransaction();

                //updating post
                $service = $this->servicesInterface->update($request, $id);

                //updating post image
                $postImage = $this->serviceImageInterface->update($service->id, $request->banner_image);

                DB::commit();

                return redirect()->route('admin.services.all')->with('success', 'Service created successfully !');

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
    public function viewServiceBySlug($slug)
    {
        try {
            if (Auth::user()->can('view-services')) {
                //retrieving post by slugt
                $service = $this->servicesInterface->viewServiceBySlug($slug);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.services.service_single', compact('service','statuses'));

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
    public function destroy($slug)
    {
        try {
            if (Auth::user()->can('delete-services')) {
                DB::beginTransaction();

                $service = $this->servicesInterface->destroy($slug);

                DB::commit();

                return redirect()->route('admin.services.all')->with('success', 'Service deleted successfully !');

            } else {
                
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
