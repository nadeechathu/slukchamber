<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory , Loggable;

    /**
     * use class Permission
     *
     * @table permissions
     *
     * @property integer $id
     * @property string $name
     * @property string $guard_name
     * @property unsignedBigInteger $system_module_id
     * @property integer $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'name',
        'system_module_id',
        'guard_name',
        'status'
    ];

    public function system_module()
    {
        return $this->hasOne(SystemModule::class, 'id', 'system_module_id');
    }

    public static function getPermissionsForFilters(Request $request){

        return Permission::with('system_module')
        ->where('status',1)
        ->where(function($query) use($request){

            if($request->searchKey != null){

                $query->where('name','like','%'.$request->searchKey.'%')
                ->orWhere('guard_name','like','%'.$request->searchKey.'%');

            }else{

                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }
    public static function getAllPermissionsByStatus($status){

        return Permission::where('status',$status)->get();

    }

}
