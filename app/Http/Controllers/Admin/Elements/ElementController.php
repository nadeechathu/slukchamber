<?php

namespace app\Http\Controllers\Admin\Elements;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Elements\CreateElementRequest;
use App\Http\Requests\Admin\Elements\UpdateElementRequest;
use App\Interfaces\Admin\Elements\ElementInterface;
use App\Models\ElementParameter;
use App\Models\Parameter;
use App\Models\Element;
use App\Models\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ElementController extends Controller
{
    private ElementInterface $elementInterface;

    //Used services
    public function __construct(ElementInterface $elementInterface)
    {
        $this->middleware('auth');
        $this->elementInterface = $elementInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {


            if (Auth::user()->can('view-elements')) {

                $searchKey = $request->searchKey;

                $elements = $this->elementInterface->index($request);
                return view('admin.elements.all_elements', compact('elements','searchKey'));

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
        if (Auth::user()->can('create-elements')) {


            $parameters = $this->elementInterface->createUi();
            $statuses = StatusEnum::cases();
            $tables = DB::select('SHOW TABLES');
            $tables = Utilities::getSystemSchemas();
            
            return view('admin.Elements.create_element',compact('parameters','statuses','tables'));

        } else {
            return view('admin.errors.403_forbidden');
        }
    }
    /**
     * Store a newly created element in storage.
     */
    public function create(CreateElementRequest $request)
    {
        try {

            if (Auth::user()->can('create-elements')) {

                DB::beginTransaction();

                //creating element
                $element = $this->elementInterface->create($request);
                DB::commit();

                return redirect()->route('admin.elements.all')->with('success', 'Element created successfully !');

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
            if (Auth::user()->can('edit-elements')) {

                $parameters = Parameter::where('status', 1)->pluck('name', 'id');
                $elementParameters = ElementParameter::with('parameter')->where('element_id', $id)->get();
                $statuses = StatusEnum::cases(); //Active statuses
                $element = Element::find($id);
                
                $tables = Utilities::getSystemSchemas();

                return view('admin.Elements.edit_element', compact('element','parameters','elementParameters','statuses','tables'));
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }
    /**
     * Update the specified element in storage.
     */
    public function update(UpdateElementRequest $request, $id)
    {
        try {

            if (Auth::user()->can('edit-elements')) {

                DB::beginTransaction();

                //updating element
                $permission = $this->elementInterface->update($request, $id);

                DB::commit();

                return redirect()->route('admin.elements.all')->with('success', 'Element updated successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified element from storage.
     */
    public function destroy($id)
    {
        try {

            if (Auth::user()->can('delete-elements')) {

                DB::beginTransaction();

                $permission = $this->elementInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.elements.all')->with('success', 'Element deleted successfully !');

            } else {

                return view('admin.errors.403_forbidden');
            }

        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }
    }
}
