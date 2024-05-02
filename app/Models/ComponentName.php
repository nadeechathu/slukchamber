<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ComponentName extends Model
{
    use HasFactory, Loggable;

    /**
     * use class ComponentName
     *
     * @table component_names
     *
     * @property int $id
     * @property string $name
     * @property bool $status             active => 1, inactive => 0
     *
     */

    protected $fillable = ['name','status'];

    /**
     * Get all component names
     */
    public static function getAllComponentNames(Request $request){

        return ComponentName::where('status',1)->where(function($query) use($request){

            if($request->searchKey != null){

                $query->where('name','like','%'.$request->searchKey.'%');

            }else{

                $query;
            }
        })->get();
    }


    /**
     * Get requested components
     */
    public function commonComponents(){

        return $this->hasMany(Component::class)->with('componentElements');
    }
}
