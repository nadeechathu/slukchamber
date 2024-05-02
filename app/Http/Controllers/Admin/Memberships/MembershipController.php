<?php

namespace app\Http\Controllers\Admin\Memberships;

use App\Enums\CategoryTypesEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\Memberships\CreateMembershipRequest;
use App\Http\Requests\Admin\Memberships\UpdateMembershipRequest;

//interfaces
use App\Interfaces\Admin\Memberships\MembershipInterface;

//models
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    private MembershipInterface $membershipInterface;

    //Used services
    public function __construct(MembershipInterface $membershipInterface)
    {
        $this->middleware('auth');
        $this->membershipInterface = $membershipInterface;
    }

    /**
     * Display a listing of memberships.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-memberships')) {

                $searchKey = $request->searchKey;

                $memberships = $this->membershipInterface->index($request);

                $statuses = StatusEnum::cases(); //Active statuses

                return view('admin.memberships.all_memberships', compact('memberships','searchKey','statuses'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new membership.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-memberships')) {

            $categories = $this->membershipInterface->createUi();

            $statuses = StatusEnum::cases(); //Active statuses

            return view('admin.memberships.components.create_membership', compact('categories','statuses'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created membership in storage.
     */
    public function create(CreateMembershipRequest $request)
    {

        try {
            if (Auth::user()->can('create-memberships')) {

                DB::beginTransaction();

                //creating post
                $post = $this->membershipInterface->create($request);

                DB::commit();

                return redirect()->route('admin.memberships.all')->with('success', 'Membership created successfully !');

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
    public function updateUi($id)
    {

        try {
            if (Auth::user()->can('edit-memberships')) {
                
                $membership = $this->membershipInterface->updateUi($id);

                $statuses = StatusEnum::cases(); //Active statuses
                
                return view('admin.memberships.components.edit_membership', compact('membership','statuses'));

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
    public function update(UpdateMembershipRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-memberships')) {

                DB::beginTransaction();

                //updating membership
                $membershipmembership = $this->membershipInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.memberships.all')->with('success', 'Membership updated successfully !');


            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function viewMembershipBySlug($slug)
    {
        try {
            if (Auth::user()->can('view-memberships')) {
                //retrieving post by slug
                $membership = $this->membershipInterface->viewMembershipBySlug($slug);

                return view('admin.memberships.membership_single', compact('membership'));

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            if (Auth::user()->can('delete-memberships')) {
                
            DB::beginTransaction();

            $membership = $this->membershipInterface->destroy($slug);

            DB::commit();

            return redirect()->route('admin.memberships.all')->with('success', 'Membership deleted successfully !');

        } else {
            
            return view('admin.errors.403_forbidden');
        }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
