<?php

namespace app\Http\Controllers\Admin\Users;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Interfaces\Admin\Roles\RoleInterface;

//interfaces
use App\Interfaces\Admin\Users\UserInterface;

//models
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private UserInterface $userInterface;
    private RoleInterface $roleInterface;

    //Used services
    public function __construct(UserInterface $userInterface, RoleInterface $roleInterface)
    {
        $this->middleware('auth');
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
    }

    /**
     * Display a listing of users.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-users')) {
                $searchKey = $request->searchKey;
                $users = $this->userInterface->index($request);
                $roles = $this->roleInterface->index();
                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.users.all_users', compact('users', 'roles','searchKey','statuses'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new user.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-users')) {
            return $this->userInterface->createUi();
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created user in storage.
     */
    public function create(CreateUserRequest $request)
    {

        try {
            if (Auth::user()->can('create-users')) {
                DB::beginTransaction();

                //creating user
                $user = $this->userInterface->create($request);

                DB::commit();

                return redirect()->route('admin.users.all')->with('success', 'User created successfully !');
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
            if (Auth::user()->can('edit-users')) {
                $user = User::find($id);

                return view('admin.users.components.edit_user', compact('user'));
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
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-users')) {
                DB::beginTransaction();

                //updating user
                $user = $this->userInterface->update($request, $id);

                DB::commit();

                return back()->with('success', 'User updated successfully !');
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
            if (Auth::user()->can('delete-users')) {
                DB::beginTransaction();

                $user = $this->userInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.users.all')->with('success', 'User deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Display a specific user.
     */
    public function profile()
    {
        try {
            if (Auth::user()->can('view-user-profile')) {
                $id = Auth::id();
                $user = $this->userInterface->profile($id);
                $statuses = StatusEnum::cases(); //Active statuses
                $role = $user->roles[0];
                return view('admin.users.profile', compact('user', 'role', 'statuses'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

}
