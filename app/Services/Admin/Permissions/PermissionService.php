<?php

namespace App\Services\Admin\Permissions;

use App\Models\Role;
use App\Services\Admin\Roles\RolePermissionHistoryService;
use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Permissions\CreatePermissionRequest;
use App\Http\Requests\Admin\Permissions\UpdatePermissionRequest;

//models
use App\Models\Permission;

//interfaces
use App\Interfaces\Admin\Permissions\PermissionInterface;

class PermissionService implements PermissionInterface
{

    private RolePermissionHistoryService $rolePermissionHistoryService;

    //Used services
    public function __construct(RolePermissionHistoryService $rolePermissionHistoryService)
    {;
        $this->rolePermissionHistoryService = $rolePermissionHistoryService;

    }

    /**
     * Display a listing of permissions.
     */
    public function index(Request $request)
    {

        $permissions = Permission::getPermissionsForFilters($request);

        // $permissions->appends(request()->query())->links();

        return $permissions;
    }

    /**
     * Show the form for creating a new permission.
     */
    public function createUi()
    {
        return view('admin.permissions.create_permissions');

    }

    /**
     * Store a newly created permission in storage.
     */
    public function create(CreatePermissionRequest $request)
    {

        $permission = new Permission();

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->system_module_id = $request->system_module_id;
        $permission->status = $request->status;
        $permission->save();

        return $permission;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $permission = Permission::find($id);

        return $permission;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, $id)
    {

        $permission = Permission::find($id);

        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->system_module_id = $request->system_module_id;
        $permission->status = $request->status;

        $permission->save();

        return $permission;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = Permission::where('id', $id)->delete();

        return $deletedCount;

    }

    /**
     * Get all available permissions.
     */
    public function getAllPermissions()
    {

        $permissions = Permission::all();

        return $permissions;
    }

    /**
     * Enable or disable permissions related to module id
    */
    public function permissionStatus($id, $status) //module id , module status
    {
        $permissions = Permission::where('system_module_id', $id)->get();

        $roles = Role::with('permissions')->get();

        foreach ($roles as $role){
            //initiate empty array for each role
            $permission_ids = array();
            foreach ( $permissions as $permission){
                foreach ($role->permissions as $role_permission){
                    if ($role_permission->id == $permission->id){
                        array_push($permission_ids, $permission->id);
                    }
                }

                $permission->status = $status;
                $permission->save();
            }

            if ($status == 1){
                //give role permissions and remove role permission history
                $permission = $this->rolePermissionHistoryService->destroy($id, $role);  //module_id
            }
            else{
                //remove role permissions and add role permission history
                if ($permission_ids != null) {
                    $permission = $this->rolePermissionHistoryService->create($permission_ids, $role);
                }
            }

        }

        return $permission_ids;
    }

    /**
     * Get all permissions by status
     */
    public function getAllPermissionsByStatus($status){

        return Permission::getAllPermissionsByStatus($status);
    }
}

