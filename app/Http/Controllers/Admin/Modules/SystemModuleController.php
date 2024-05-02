<?php

namespace app\Http\Controllers\Admin\Modules;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Modules\CreateModuleRequest;
use App\Http\Requests\Admin\Modules\UpdateModuleRequest;
use App\Interfaces\Admin\Modules\ModuleInterface;
use App\Interfaces\Admin\Permissions\PermissionInterface;
use App\Interfaces\Admin\Roles\RolePermissionHistoryInterface;
use App\Models\SystemModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SystemModuleController extends Controller
{
    private ModuleInterface $moduleInterface;
    private PermissionInterface $permissionInterface;
    private RolePermissionHistoryInterface $rolePermissionHistoryInterface;

    //Used services
    public function __construct(ModuleInterface $moduleInterface, PermissionInterface $permissionInterface, RolePermissionHistoryInterface $rolePermissionHistoryInterface)
    {
        $this->middleware('auth');
        $this->moduleInterface = $moduleInterface;
        $this->permissionInterface = $permissionInterface;
        $this->rolePermissionHistoryInterface = $rolePermissionHistoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {


            if (Auth::user()->can('view-modules')) {

                $searchKey = $request->searchKey;

                $modules = $this->moduleInterface->index($request);
                return view('admin.system_modules.all_modules', compact('modules','searchKey'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    /**
     * Show the form for creating a new parameter.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-modules')) {
            return $this->moduleInterface->createUi();
        } else {
            return view('admin.errors.403_forbidden');
        }
    }
    /**
     * Store a newly created module in storage.
     */
    public function create(CreateModuleRequest $request)
    {
        try {

            if (Auth::user()->can('create-modules')) {

                DB::beginTransaction();

                //creating module
                $module = $this->moduleInterface->create($request);
                DB::commit();

                return redirect()->route('admin.system-modules.all')->with('success', 'Module created successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi( $id)
    {
        try {
            if (Auth::user()->can('edit-modules')) {
                $parameters = Parameter::where('status', 1)->pluck('name', 'id');
                $moduleParameters = ModuleParameter::with('parameter')->where('module_id', $id)->get();
                $statuses = StatusEnum::cases(); //Active statuses
                $module = Module::find($id);
                return view('admin.Modules.edit_module', compact('module','parameters','moduleParameters','statuses'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    /**
     * Update the specified module in storage.
     */
    public function update(UpdateModuleRequest $request)
    {
        try {

            if (Auth::user()->can('edit-modules')) {

                DB::beginTransaction();

                //updating module
                $modules = $this->moduleInterface->update($request);

                //update permission status
                foreach ($modules as $module){

                    $permission_ids = $this->permissionInterface->permissionStatus($module->id, $module->status);

//                    if ($module->status == 1){
//
//                        //activate modules with assigning module permissions to the roles
//                        $this->rolePermissionHistoryInterface->destroy($permission_ids);
//                    }
//                    else {
//
//                        //deactivate modules with revoking module permissions from roles
//                        $this->rolePermissionHistoryInterface->create($permission_ids);
//                    }

                }

                DB::commit();

                return redirect()->route('admin.system-modules.all')->with('success', 'Module updated successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified module from storage.
     */
    public function destroy($id)
    {
        try {

            if (Auth::user()->can('delete-modules')) {

                DB::beginTransaction();

                $permission = $this->moduleInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.system-modules.all')->with('success', 'Module deleted successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }

        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }
}
