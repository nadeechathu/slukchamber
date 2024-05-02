<?php

namespace App\Services\Admin\DirectorBoards;

//requests

use App\Http\Requests\Admin\DirectorBoards\CreateDirectorBoardRequest;
use App\Http\Requests\Admin\DirectorBoards\UpdateDirectorBoardRequest;
use Illuminate\Http\Request;

//models

//interfaces
use App\Interfaces\Admin\DirectorBoards\DirectorBoardInterface;
use App\Models\DirectorBoard;

class DirectorBoardService implements DirectorBoardInterface
{

    /**
     * Display a listing of posts.
     */
    public function index(Request $request)
    {

        $inquiries = DirectorBoard::getAllDirectorsForFilters($request);

        $inquiries->appends(request()->query())->links();

        return $inquiries;
    }


    public function createUi()
    {

    }

    /**
     * Store a newly created member in storage.
     */
    public function create(CreateDirectorBoardRequest $request)
    {

        $director = new DirectorBoard();

        $director->name = $request->name;
        $director->description = $request->description;
        $director->designation = $request->designation;
        $director->email = $request->email;
        $director->status = $request->status;

        //uploading banner image
        if ($request->image != null) {

            $imageName = 'image_' . time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/uploads/directors/images/'), $imageName);
            $bannerPath = 'images/uploads/directors/images/' . $imageName;

            $director->image = $bannerPath;
        }


        $director->save();

        return $director;
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function updateUi($id)
    {
        $director = DirectorBoard::where('id', $id)->get()->first();

        return $director;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDirectorBoardRequest $request, $id)
    {
        $director = DirectorBoard::find($id);

        $director->name = $request->name;
        $director->description = $request->description;
        $director->designation = $request->designation;
        $director->email = $request->email;
        $director->status = $request->status;

        //uploading banner image
        if ($request->image != null) {

            $imageName = 'image_' . time() . '.' . $request->image->extension();

            $request->image->move(public_path('images/uploads/directors/images/'), $imageName);
            $bannerPath = 'images/uploads/directors/images/' . $imageName;

            $director->image = $bannerPath;
        }


        $director->save();

        return $director;
    }
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $membership = DirectorBoard::where('id', $id)->first();
        $deletedCount = DirectorBoard::where('id', '=', $id)->delete();

        return $deletedCount;

    }
}
