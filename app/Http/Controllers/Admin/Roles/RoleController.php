<?php

namespace app\Http\Controllers\Admin\Roles;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use App\Interfaces\Admin\Permissions\PermissionInterface;
use App\Interfaces\Admin\Roles\RoleInterface;
use App\Models\SystemModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    private RoleInterface $roleInterface;
    private PermissionInterface $permissionInterface;

    //Used services
    public function __construct(RoleInterface $roleInterface, PermissionInterface $permissionInterface)
    {
        $this->middleware('auth');
        $this->roleInterface = $roleInterface;
        $this->permissionInterface = $permissionInterface;
    }

    /**
     * Display a listing of roles.
     */
    public function index()
    {

        try {
            if (Auth::user()->can('view-roles')) {

                $roles = $this->roleInterface->index();

                $permissions = $this->permissionInterface->getAllPermissionsByStatus(StatusEnum::ACTIVE);

                //grouping permissions
                $groupedPermissions = $permissions->groupBy('system_module_id');

                $permissionsArray = array();

                foreach($groupedPermissions as $moduleId => $permissionItems){

                    if($moduleId == null){

                        $permissionsArray['others'] = $permissionItems;

                    }else{

                        $module = SystemModule::where('id',$moduleId)->get()->first();
                        $permissionsArray[$module->name] = $permissionItems;

                    }

                }

                $groupedPermissions = $permissionsArray;

                return view('admin.roles.all_roles', compact('roles', 'permissions','groupedPermissions'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new role.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-roles')) {
            return $this->roleInterface->createUi();
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created role in storage.
     */
    public function create(CreateRoleRequest $request)
    {

        try {
            if (Auth::user()->can('create-roles')) {
                DB::beginTransaction();

                //creating role
                $role = $this->roleInterface->create($request);

                DB::commit();

                return redirect()->route('admin.roles.all')->with('success', 'Role created successfully !');
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
            if (Auth::user()->can('edit-roles')) {
                $role = Role::find($id);

                return view('admin.roles.components.edit_role', compact('role'));
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
    public function update(UpdateRoleRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-roles')) {
                DB::beginTransaction();

                //updating role
                $role = $this->roleInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.roles.all')->with('success', 'Role updated successfully !');
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
            if (Auth::user()->can('delete-roles')) {
                DB::beginTransaction();

                $role = $this->roleInterface->destroy($slug);

                DB::commit();

                return redirect()->route('admin.roles.all')->with('success', 'Role deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
