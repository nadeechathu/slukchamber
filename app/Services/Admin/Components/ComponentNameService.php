<?php

namespace App\Services\Admin\Components;

use Illuminate\Http\Request;

//models
use App\Models\ComponentName;


//interfaces
use App\Interfaces\Admin\Components\ComponentNameInterface;

class ComponentNameService implements ComponentNameInterface
{

    /**
     * Display a listing of components.
     */
    public function index(Request $request)
    {
        $componentNames = ComponentName::getAllComponentNames($request);

        return $componentNames;
    }

   
}
