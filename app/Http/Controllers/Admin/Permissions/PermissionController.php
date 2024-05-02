<?php

namespace app\Http\Controllers\Admin\Permissions;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permissions\CreatePermissionRequest;
use App\Http\Requests\Admin\Permissions\UpdatePermissionRequest;
use App\Interfaces\Admin\Permissions\PermissionInterface;

use App\Interfaces\Admin\Roles\RolePermissionHistoryInterface;
use App\Models\SystemModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    private PermissionInterface $permissionInterface;
    private RolePermissionHistoryInterface $rolePermissionHistoryInterface;

    //Used services
    public function __construct(PermissionInterface $permissionInterface, RolePermissionHistoryInterface $rolePermissionHistoryInterface)
    {
        $this->middleware('auth');
        $this->permissionInterface = $permissionInterface;
        $this->rolePermissionHistoryInterface = $rolePermissionHistoryInterface;
    }

    /**
     * Display a listing of permissions.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-permissions')) {

                $searchKey = $request->searchKey;

                $permissions = $this->permissionInterface->index($request);

                $system_modules = SystemModule::where('status','1')->get();

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.permissions.all_permissions', compact('permissions','searchKey', 'system_modules', 'statuses'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new permission.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-permissions')) {
            return $this->permissionInterface->createUi();
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created permission in storage.
     */
    public function create(CreatePermissionRequest $request)
    {

        try {
            if (Auth::user()->can('create-permissions')) {
                DB::beginTransaction();

                //creating permission
                $permission = $this->permissionInterface->create($request);

                DB::commit();

                return redirect()->route('admin.permissions.all')->with('success', 'Permission created successfully !');
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
    public function updateUi(Request $id)
    {
        try {
            if (Auth::user()->can('edit-permissions')) {
                $permission = Permission::find($id);

                return view('admin.permissions.components.edit_permission', compact('permission'));
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
    public function update(UpdatePermissionRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-permissions')) {
                DB::beginTransaction();

                //updating permission
                $permission = $this->permissionInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.permissions.all')->with('success', 'Permission updated successfully !');
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
    public function destroy($id)
    {
        try {
            if (Auth::user()->can('delete-permissions')) {
                DB::beginTransaction();

                $permission = $this->permissionInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.permissions.all')->with('success', 'Permission deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Enable or disable permissions related to module id
     */
    public function permissionStatus($id, $status)   //module is and module status
    {
        try {
            $permission_ids = $this->permissionInterface->permissionStatus($id, $status);

//            if ($status == 1){
//                $permissionHistory = $this->rolePermissionHistoryInterface->destroy($permission_ids);
//            }
//            else {
//                $permissionHistory = $this->rolePermissionHistoryInterface->create($permission_ids);
//            }


            DB::commit();

            return redirect()->route('admin.permissions.all')->with('success', 'Permission deleted successfully !');
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }
}
