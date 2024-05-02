<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;

class Component extends Model
{
    use HasFactory, Loggable;

    /**
     * use class Component
     *
     * @table components
     *
     * @property int $id
     * @property string $name
     * @property bool $status             active => 1, inactive => 0
     * @property string $layout_image     image of the component layout
     * @property int $component_name_id   common name for component
     *
     */

    //values needed to fill
    protected $fillable = [
        'name',
        'status',
        'layout_image',
        'component_name_id'
    ];

    public function elements(){
        return $this->belongsToMany(Element::class, 'component_has_elements');
    }

    public function componentElements(){

        return $this->belongsToMany(Element::class, 'component_has_elements')->with('parameters')->where('elements.status',1);
    }

    public function commonName(){

        return $this->belongsTo(ComponentName::class,'component_name_id','id');
    }

    public static function getAllComponentsForFilters(Request $request)
    {
        return Component::with('elements','commonName')
            ->where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('name', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

}
