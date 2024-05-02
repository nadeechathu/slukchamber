<?php

namespace app\Http\Controllers\Admin\Parameters;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parameters\CreateParameterRequest;
use App\Http\Requests\Admin\Parameters\UpdateParameterRequest;
use App\Interfaces\Admin\Parameters\ParameterInterface;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParameterController extends Controller
{
    private ParameterInterface $parameterInterface;

    //Used services
    public function __construct(ParameterInterface $parameterInterface)
    {
        $this->middleware('auth');
        $this->parameterInterface = $parameterInterface;
    }

    /**
     * Display a listing of parameters.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-parameters')) {

            $searchKey = $request->searchKey;

            $parameters = $this->parameterInterface->index($request);
            return view('admin.Parameters.all_parameters', compact('parameters', 'searchKey'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new parameter.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-parameters')) {
        return $this->parameterInterface->createUi();
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created parameter in storage.
     */
    public function create(CreateParameterRequest $request)
    {

        try {
            if (Auth::user()->can('create-parameters')) {
                DB::beginTransaction();

                //creating parameter
                $parameter = $this->parameterInterface->create($request);

                DB::commit();

                return redirect()->route('admin.parameters.all')->with('success', 'Parameter created successfully !');
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
    public function updateUi( $id)
    {
        try {
            if (Auth::user()->can('edit-parameters')) {

                $parameters = Parameter::where('status', 1)->pluck('name', 'id');
                $parameter = Parameter::find($id);
                $statuses = StatusEnum::cases(); //Active statuses
                return view('admin.Parameters.components.edit_parameters', compact('parameter','parameters','statuses'));
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
    public function update(UpdateParameterRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-parameters')) {
                DB::beginTransaction();

                //updating parameters\
                $parameter = $this->parameterInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.parameters.all')->with('success', 'Parameter updated successfully !');
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
            if (Auth::user()->can('delete-parameters')) {
                DB::beginTransaction();

                $parameter = $this->parameterInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.parameters.all')->with('success', 'Parameter deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
