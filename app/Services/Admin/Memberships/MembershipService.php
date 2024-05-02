<?php

namespace App\Services\Admin\Memberships;

//requests
use App\Http\Requests\Admin\Memberships\CreateMembershipRequest;
use App\Http\Requests\Admin\Memberships\UpdateMembershipRequest;

use Illuminate\Http\Request;

//models
use App\Models\Category;

//interfaces
use App\Interfaces\Admin\Memberships\MembershipInterface;
use App\Models\Membership;
use App\Models\Utilities;

class MembershipService implements MembershipInterface
{

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {

        $memberships = Membership::getAllMemberShipsForFilters($request);

        $memberships->appends(request()->query())->links();

        return $memberships;
    }

    /**
     * Show the form for creating a new post.
     */
    public function createUi()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');

        return $categories;

    }

    /**
     * Store a newly created post in storage.
     */
    public function create(CreateMembershipRequest $request)
    {

        $membership = new Membership();

        $membership->title = $request->title;
        $membership->short_description = $request->short_description;
        $membership->description = $request->description;
        $membership->slug = $request->slug;
        $membership->price = $request->price;
        $membership->status = $request->status;

        //uploading banner image
        if ($request->banner_image != null) {

            $imageName = 'image_' . time() . '.' . $request->banner_image->extension();

            $request->banner_image->move(public_path('images/uploads/memberships/images/'), $imageName);
            $bannerPath = 'images/uploads/memberships/images/' . $imageName;

            $membership->banner_image = $bannerPath;
        }

        //uploading pdf file
        if ($request->pdf_file != null) {

            $fileName = 'pdf_' . time() . '.' . $request->pdf_file->extension();

            $request->pdf_file->move(public_path('images/uploads/memberships/files/'), $fileName);
            $filePath = 'images/uploads/memberships/files/' . $fileName;

            $membership->pdf_file = $filePath;
        }


        $membership->save();

        return $membership;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $membership = Membership::where('id', $id)->get()->first();

        return $membership;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembershipRequest $request, $id)
    {
        $membership = Membership::find($id);

        $membership->title = $request->title;
        $membership->short_description = $request->short_description;
        $membership->description = $request->description;
        $membership->slug = $request->slug;
        $membership->price = $request->price;
        $membership->status = $request->status;

        //uploading banner image
        if ($request->banner_image != null) {

            $imageName = 'image_' . time() . '.' . $request->banner_image->extension();

            $request->banner_image->move(public_path('images/uploads/memberships/images/'), $imageName);
            $bannerPath = 'images/uploads/memberships/images/' . $imageName;

            $membership->banner_image = $bannerPath;
        }

        //uploading pdf file
        if ($request->pdf_file != null) {

            $fileName = 'pdf_' . time() . '.' . $request->pdf_file->extension();

            $request->pdf_file->move(public_path('images/uploads/memberships/files/'), $fileName);
            $filePath = 'images/uploads/memberships/files/' . $fileName;

            $membership->pdf_file = $filePath;
        }
        
        $membership->save();

        return $membership;
    }

    /**
     * Display the specified resource.
     */
    public function viewMembershipBySlug($slug)
    {

        $membership = Membership::where('slug', $slug)->first();

        return $membership;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {

        $membership = Membership::where('slug', $slug)->first();
        $membership->categories()->detach();
        $deletedCount = Membership::where('slug', '=', $slug)->delete();

        return $deletedCount;

    }
}
