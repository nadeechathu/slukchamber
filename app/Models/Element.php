<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory,Loggable;
    /**
     * use class Element
     *
     * @table elements
     *
     * @property int $id
     * @property string $element_name
     * @property boolean $status  active => 1, inactive => 0
     *
     */

    //values needed to fill
    protected $fillable = ['element_name','status','mapped_with'];

    public function parameters()
    {
        return $this->belongsToMany(Parameter::class,'element_has_parameters')->with('children')->where('parameters.status',1);
    }

    public static function getElementsForFilters($request){
        return Element::where(function($query) use ($request){
            if($request->searchKey!=null){
                $query->where('element_name', 'like', '%' . $request->searchKey . '%');
            }else{
                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }
}
