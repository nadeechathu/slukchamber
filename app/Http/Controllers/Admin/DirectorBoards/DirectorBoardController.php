<?php

namespace app\Http\Controllers\Admin\DirectorBoards;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DirectorBoards\CreateDirectorBoardRequest;
use App\Http\Requests\Admin\DirectorBoards\UpdateDirectorBoardRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests


//interfaces
use App\Interfaces\Admin\DirectorBoards\DirectorBoardInterface;

//models
use Illuminate\Support\Facades\Auth;

class DirectorBoardController extends Controller
{
    private DirectorBoardInterface $directorBoardInterface;

    //Used services
    public function __construct(DirectorBoardInterface $directorBoardInterface)
    {
        $this->middleware('auth');
        $this->directorBoardInterface = $directorBoardInterface;
    }

    /**
     * Display a listing of memberships.
     */
    public function index(Request $request)
    {
        try {
            if (Auth::user()->can('view-director-board')) {

                $searchKey = $request->searchKey;

                $directors = $this->directorBoardInterface->index($request);

                return view('admin.director_board.all_director_board', compact('directors','searchKey'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
 * Show the form for creating a new member.
 */
    public function createUi()
    {
        if (Auth::user()->can('create-director-board')) {

            $statuses = StatusEnum::cases(); //Active statuses

            return view('admin.director_board.components.create_director_board', compact('statuses'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }


    /**
     * Store a newly created member in storage.
     */
    public function create(CreateDirectorBoardRequest $request)
    {

        try {
            if (Auth::user()->can('create-director-board')) {

                DB::beginTransaction();

                //creating member
                $this->directorBoardInterface->create($request);

                DB::commit();

                return redirect()->route('admin.director_board.all')->with('success', 'Staff member created successfully !');

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
            if (Auth::user()->can('edit-director-board')) {
                
                $director = $this->directorBoardInterface->updateUi($id);

                $statuses = StatusEnum::cases(); //Active statuses
                
                return view('admin.director_board.components.edit_director_board', compact('director','statuses'));

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
    public function update(UpdateDirectorBoardRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-director-board')) {

                DB::beginTransaction();

                //updating member
                $this->directorBoardInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.director_board.all')->with('success', 'Staff member updated successfully !');


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
            if (Auth::user()->can('delete-director-board')) {
                
            DB::beginTransaction();

            $this->directorBoardInterface->destroy($id);

            DB::commit();

            return redirect()->route('admin.director_board.all')->with('success', 'Staff member deleted successfully !');

        } else {
            
            return view('admin.errors.403_forbidden');
        }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }

}
