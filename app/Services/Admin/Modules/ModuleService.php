<?php

namespace App\Services\Admin\Modules;

use App\Enums\StatusEnum;
use App\Models\Permission;
use App\Services\Admin\Permissions\PermissionService;
use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Modules\CreateModuleRequest;
use App\Http\Requests\Admin\Modules\UpdateModuleRequest;

//models
use App\Models\SystemModule;

//interfaces
use App\Interfaces\Admin\Modules\ModuleInterface;

class ModuleService implements ModuleInterface
{

    /**
     * Display a listing of modules.
     */
    public function index(Request $request)
    {

        $modules = SystemModule::getModulesForFilters($request);
        $modules->appends(request()->query())->links();

        return $modules;
    }

   /**
     * Show the form for creating a new module.
     */
    public function createUi()
    {

        $statuses = StatusEnum::cases(); //Active statuses
        return view('admin.system_modules.components.create_module', compact('statuses'));

    }

    /**
     * Store a newly created module in storage.
     */
    public function create(CreateModuleRequest  $request)
    {

        $module = new SystemModule();

        $module->name = $request->name;
        $module->status = $request->status;
        $module->save();

        return $module;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $module = SystemModule::find($id);

        return $module;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request)
    {
        //all modules
        $modules = array();

        //get all modules ids
        $ids = $request->ids;

        //get module ids and status
        $statuses = $request->statuses;


        //status value = 1 module ids
            $new_values = array();
            //separate module id and status

            foreach ($statuses as $key_s => $status) {

                $id_values = preg_split("/\,/", $status);

                $new_status = $id_values[0];
                $m_id = $id_values[1];
                //status 0 to 1 changed ids
                if ($new_status == 0 ){
                    $module = SystemModule::find($m_id);
                    $module->status = 1;
                    $module->save();

                    array_push($modules, $module);
                }

                foreach ($id_values as $key => $id_value) {
                    if ($key == 1) {
                        array_push($new_values, $id_value);
                    }
                }
            }

            //status 1 to 0 changed ids
            $new_ids = array_diff($ids, $new_values);

            foreach ($new_ids as $new_id){
                $module = SystemModule::find($new_id);
                    $module->status = 0;
                    $module->save();

                array_push($modules, $module);
                }

        return $modules;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = SystemModule::where('id', $id)->delete();

        return $deletedCount;

    }
}

