<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory,Loggable;

    /**
     * use class ElementParameter
     *
     * @table element_parameters
     *
     * @property int $id
     * @property string $name
     * @property string $parent_id
     * @property string $link
     * @property string $image_src
     * @property boolean $status  active => 1, inactive => 0
     * @property longtext $content
     * @property string $main_heading
     * @property string $sub_heading
     *
     */

    //values needed to fill
    protected $fillable = ['name','main_heading','sub_heading','content','parent_id','link','image_src','status'];

    
    public function elements()
    {
        return $this->belongsToMany(Element::class,'element_has_parameters');
    }

    public function children(){

        return $this->hasMany(Parameter::class,'parent_id','id');
    }

    public static function getParametersForFilters($request){
        return Parameter::where(function($query) use ($request){
            if($request->searchKey!=null){
                $query->where('name', 'like', '%' . $request->searchKey . '%');
            }else{
                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }

}
