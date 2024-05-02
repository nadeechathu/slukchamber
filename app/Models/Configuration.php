<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;

class Configuration extends Model
{
    use HasFactory, Loggable;

    /**
     * use class Configuration
     *
     * @table components
     *
     * @property int $id
     * @property int $enabled_on_api             enabled => 1, not enabled => 0
     * @property string $configuration_key       active => 1, inactive => 0
     * @property string $configuration_value     config value
     * @property int $type                       defines the configration type on ConfigurationTypeEnum
     * @property int $mapping_id                 mapping id with the configuration type relation table
     *
     */

    protected $fillable = ['enabled_on_api','configuration_key','configuration_value','type','mapping_id'];

    public function component(){

        return $this->belongsTo(Component::class,'mapping_id','id')->with('commonName','componentElements');
    }

    public static function getConfigurationsForFilters(Request $request){

        return Configuration::with('component')->where(function($query) use($request){

            if($request->searchKey != null){

                $query->where('configuration_key','like','%'.$request->searchKey.'%');

            }else{

                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }
}
