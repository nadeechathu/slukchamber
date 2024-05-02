<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemModule extends Model
{
    use HasFactory,Loggable;
    /**
     * use class Element
     *
     * @table elements
     *
     * @property int $id
     * @property string $name
     * @property boolean $status  active => 1, inactive => 0
     *
     */

    //values needed to fill
    protected $fillable = ['name','status'];

    public static function getModulesForFilters($request){
        return SystemModule::where(function($query) use ($request){
            if($request->searchKey!=null){
                $query->where('name', 'like', '%' . $request->searchKey . '%');
            }else{
                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }
}
