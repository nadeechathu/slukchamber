<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Utilities extends Model
{
    use HasFactory;

    //remove files from the server
    public static function removeFileFromThePath($filepath)
    {

        if (File::exists(public_path($filepath))) {

            File::delete(public_path($filepath));

            return true;

        } else {

            return false;
        }
    }

    //get system table schemas
    public static function getSystemSchemas(){

        $tables = DB::select('SHOW TABLES');
        
        $tables = array_values(json_decode(json_encode($tables),true));
        
        $tableArray = array();

        foreach($tables as $table){

            array_push($tableArray,array_values($table)[0]);

        }

        return $tableArray;
    }
}
