<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;

class Membership extends Model
{
    use HasFactory;

        //values needed to fill
        protected $fillable = [
            'title',
            'short_description',
            'description',
            'banner_image',
            'slug',
            'status',
            'price',
            'pdf_file'
        ];
    
    
    public static function getAllMembershipsForFilters(Request $request)
    {
        return Membership::
            where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('title', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }
}
