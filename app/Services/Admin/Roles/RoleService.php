<?php

namespace App\Services\Admin\Roles;

use Illuminate\Support\Facades\Hash;

//requests
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;

//models
use Spatie\Permission\Models\Role;

//interfaces
use App\Interfaces\Admin\Roles\RoleInterface;

class RoleService implements RoleInterface
{

    /**
     * Display a listing of roles.
     */
    public function index()
    {

        $roles = Role::all();

        return $roles;
    }

    /**
     * Show the form for creating a new role.
     */
    public function createUi()
    {
        return view('admin.roles.create_roles');

    }

    /**
     * Store a newly created role in storage.
     */
    public function create(CreateRoleRequest $request)
    {

        $role = new Role();

        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        //assigning role permissions
        $role->givePermissionTo($request->role_permissions);

        return $role;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $role = Role::find($id);

        return $role;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, $id)
    {

        $role = Role::find($id);

        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        //update role permissions
        $role->syncPermissions($request->role_permissions);

        return $role;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = Role::where('id', $id)->delete();

        return $deletedCount;

    }
}

