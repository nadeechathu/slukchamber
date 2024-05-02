<?php

namespace App\Services\Admin\Roles;

use App\Interfaces\Admin\Roles\RolePermissionHistoryInterface;
use App\Models\Permission;
use App\Models\RolePermissionHistory;
use Database\Seeders\RoleAndPermissionSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;

//models
use Spatie\Permission\Models\Role;

//interfaces
use App\Interfaces\Admin\Roles\RoleInterface;

class RolePermissionHistoryService implements RolePermissionHistoryInterface
{

    /**
     * Store a newly created role permission history in storage.
     */
    public function create($permission_ids, $role)
    {

            $permissionsToRevoke = Permission::whereIn('id',$permission_ids)->get();

            $role->revokePermissionTo($permissionsToRevoke->pluck('name')->toArray());

            foreach ($permissionsToRevoke as $permissionToRevoke){

                $permissionHistory = new RolePermissionHistory();
                $permissionHistory->role_id = $role->id;
                $permissionHistory->permission_id = $permissionToRevoke->id;
                $permissionHistory->save();
            }

        return $permission_ids;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $role)
    {
//        $permissions = Permission::where('system_module_id', $id)->get();
//        $permission_ids= $permissions->pluck('id')->toArray();


            $permission_history = RolePermissionHistory::where('role_id', $role->id)->pluck('permission_id')->toArray();
            $permissionNames = Permission::where('system_module_id',$id)->whereIn('id', $permission_history)->pluck('name')->toArray();
//            $permissionRestore = Permission::where('system_module_id',$id)->whereIn('id', $permission_history)->pluck('id')->toArray();
//            dd($permissionNames,$permission_history);
            $role->givePermissionTo($permissionNames);

            $deletedCount = RolePermissionHistory::whereIn('permission_id', $permission_history)->delete();



        return $deletedCount;

    }
}

