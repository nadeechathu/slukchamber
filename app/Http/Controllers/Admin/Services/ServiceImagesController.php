<?php

namespace app\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\Services\ServiceImageInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceImagesController extends Controller
{
    private ServiceImageInterface $serviceImageInterface;
    //Used services
    public function __construct( ServiceImageInterface $serviceImageInterface)
    {
        $this->middleware('auth');
        $this->serviceImageInterface = $serviceImageInterface;
    }

    /**
     * Store a newly created service image in storage.
     */
    public function create($serviceId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //creating service image
            $savedServiceImage = $this->serviceImageInterface->create($serviceId, $bannerImage);

            DB::commit();

            return $savedServiceImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Update service image in storage.
     */
    public function update($serviceId, $bannerImage)
    {
        try {

            DB::beginTransaction();

            //updating service image
            $savedServiceImage = $this->serviceImageInterface->update($serviceId, $bannerImage);

            DB::commit();

            return $savedServiceImage;
        }

        catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }}
