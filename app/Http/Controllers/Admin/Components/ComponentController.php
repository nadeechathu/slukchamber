<?php

namespace app\Http\Controllers\Admin\Components;

use App\Enums\ConfigurationTypeEnum;
use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Element;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//requests
use App\Http\Requests\Admin\Components\CreateComponentRequest;
use App\Http\Requests\Admin\Components\UpdateComponentRequest;

//interfaces
use App\Interfaces\Admin\Components\ComponentInterface;
use App\Interfaces\Admin\Components\ComponentNameInterface;
use App\Interfaces\Admin\Configurations\ConfigurationInterface;
//models
use App\Models\Component;
use App\Models\Category;
use App\Models\ComponentName;
use Illuminate\Support\Facades\Auth;

class ComponentController extends Controller
{
    private ComponentInterface $componentInterface;
    private ComponentNameInterface $componentNameInterface;
    private ConfigurationInterface $configurationInterface;

    //Used services
    public function __construct(ComponentInterface $componentInterface, ComponentNameInterface $componentNameInterface, ConfigurationInterface $configurationInterface)
    {
        $this->middleware('auth');
        $this->componentInterface = $componentInterface;
        $this->componentNameInterface = $componentNameInterface;
        $this->configurationInterface = $configurationInterface;
    }

    /**
     * Display a listing of components.
     */
    public function index(Request $request)
    {

        try {
            if (Auth::user()->can('view-components')) {
                $searchKey = $request->searchKey;
                $components = $this->componentInterface->index($request);
                $elements = Element::all();

                return view('admin.component_manager.all_components', compact('components','searchKey', 'elements'));

            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for creating a new component.
     */
    public function createUi()
    {
        if (Auth::user()->can('create-components')) {

            $elements = Element::all();
            $statuses = StatusEnum::cases();
            $componentNames = $this->componentNameInterface->index(new Request());
            $configurations = $this->configurationInterface->getConfigurationsForType(ConfigurationTypeEnum::COMPONENT_BASED);

            return view('admin.component_manager.create_component', compact('elements','statuses','componentNames','configurations'));
        } else {
            return view('admin.errors.403_forbidden');
        }
    }

    /**
     * Store a newly created component in storage.
     */
    public function create(CreateComponentRequest $request)
    {

        try {
            if (Auth::user()->can('create-components')) {
                DB::beginTransaction();

                //creating component
                $component = $this->componentInterface->create($request);

                $this->configurationInterface->addComponentToConfiguration($component->id, $request->configuration);

                DB::commit();

                return redirect()->route('admin.components.all')->with('success', 'Component created successfully !');
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
            if (Auth::user()->can('edit-components')) {

                $elements = Element::all();
                $component = Component::with('elements')->where('id',$id)->get()->first();
                $statuses = StatusEnum::cases();
                
                $componentNames = $this->componentNameInterface->index(new Request());

                $configurations = $this->configurationInterface->getConfigurationsForType(ConfigurationTypeEnum::COMPONENT_BASED);

                return view('admin.component_manager.edit_component', compact('component','elements','statuses','componentNames','configurations'));
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
    public function update(UpdateComponentRequest $request, $id)
    {
        try {
            if (Auth::user()->can('edit-components')) {
                DB::beginTransaction();

                //updating component
                $component = $this->componentInterface->update($request, $id);

                $this->configurationInterface->addComponentToConfiguration($component->id, $request->configuration);

                DB::commit();

                return redirect()->route('admin.components.all')->with('success', 'Component updated successfully !');
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
    public function viewComponentById($id)
    {
        try {
            if (Auth::user()->can('view-components')) {
                //retrieving component by id
                $component = $this->componentInterface->viewComponentById($id);

                return view('admin.component_manager.components.component_single', compact('component'));
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
    public function destroy($id)
    {
        try {
            if (Auth::user()->can('delete-components')) {
                DB::beginTransaction();

                $component = $this->componentInterface->destroy($id);

                DB::commit();

                return redirect()->route('admin.components.all')->with('success', 'Component deleted successfully !');
            } else {
                return view('admin.errors.403_forbidden');
            }
        } catch (\Exception $exception) {

            DB::rollBack();

            return back()->with('error', $exception->getMessage());
        }

    }
}
