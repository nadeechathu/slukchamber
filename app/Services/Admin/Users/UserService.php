<?php

namespace App\Services\Admin\Users;

//requests

use App\Http\Requests\Admin\Roles\CreateRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

//models
use App\Models\User;
use Spatie\Permission\Models\Role;

//interfaces
use App\Interfaces\Admin\Users\UserInterface;
use Illuminate\Http\Request;

class UserService implements UserInterface
{

    /**
     * Display a listing of users.
     */
    public function index(Request $request)
    {

        $users = User::getUsersForFilters($request);

        $users->appends(request()->query())->links();

        return $users;
    }

    /**
     * Show the form for creating a new user.
     */
    public function createUi()
    {
        return view('admin.users.create_users');

    }

    /**
     * Store a newly created post in storage.
     */
    public function create(CreateUserRequest $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password != null ? Hash::make($request->password): Hash::make($request->email);
        $user->status = $request->status;

        if ($request->image != null) {

            $imageName = 'image_' . time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/uploads/users/images/'), $imageName);
            $user->image = 'images/uploads/users/images/' . $imageName;
        }
        $user->save();

        $user->assignRole($request->role);

        $role = Role::where('name',$request->role)->get()->first();

//        $user->givePermissionTo($role->permissions->pluck('name')->toArray());


        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $user = User::find($id);

        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password != null){

            $user->password = Hash::make($request->password);

        }

        if($request->status != null) {
            $user->status = $request->status;
        }

        $image = $request->image;

        if ($image != null) {

            $imageName = 'image_' . time() . '.' . $image->extension();

            $image->move(public_path('images/uploads/users/images/'), $imageName);
            $user->image = 'images/uploads/users/images/' . $imageName;
        }

        $user->save();

        //remove all roles and assigning new role and permissions
        if($request->role != null){
            $user->syncRoles($request->role);
        }

        return $user;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $deletedCount = User::where('id', $id)->delete();

        return $deletedCount;

    }

    /**
     * Get active user roles
     */
    public function userRoles()
    {

        $roles = Role::all();

        return $roles;

    }

    /**
     * Display a specific user.
     */
    public function profile($id)
    {

        $user = User::where('id',$id)->first();

        return $user;
    }

}
