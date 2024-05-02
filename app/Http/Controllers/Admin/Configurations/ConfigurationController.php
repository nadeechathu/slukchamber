<?php

namespace app\Http\Controllers\Admin\Configurations;

use App\Enums\ConfigurationTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Configurations\CreateConfigurationRequest;
use App\Http\Requests\Admin\Configurations\UpdateConfigurationRequest;
use App\Interfaces\Admin\Configurations\ConfigurationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfigurationController extends Controller
{
    private ConfigurationInterface $configurationInterface;

    //Used services
    public function __construct(ConfigurationInterface $configurationInterface)
    {
        $this->middleware('auth');
        
        $this->configurationInterface = $configurationInterface;
    }

    /**
     * Display a listing of roles.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-configurations')) {

                $searchKey = $request->searchKey;
                $configurations = $this->configurationInterface->index($request);
                $configurationTypes = ConfigurationTypeEnum::cases();

                return view('admin.configurations.all_configurations', compact('configurations','searchKey','configurationTypes'));

            } else {
                
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Store a newly created role in storage.
     */
    public function create(CreateConfigurationRequest $request)
    {

        try {
            if (Auth::user()->can('create-configurations')) {

                DB::beginTransaction();

                //creating configuration
                $configuration = $this->configurationInterface->create($request);

                DB::commit();

                return redirect()->route('admin.configurations.all')->with('success', 'Configuration created successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigurationRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-configurations')) {

                DB::beginTransaction();

                //updating configuration
                $configuration = $this->configurationInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.configurations.all')->with('success', 'Configurations updated successfully !');

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
    public function destroy($slug)
    {
        try {
            if (Auth::user()->can('delete-configurations')) {

                DB::beginTransaction();

                $configurationDeleted = $this->configurationInterface->destroy($slug);

                DB::commit();

                return redirect()->route('admin.configurations.all')->with('success', 'Configurations deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
