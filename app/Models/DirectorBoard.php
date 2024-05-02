<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DirectorBoard extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'email', 'designation', 'description', 'status'];

    public static function getAllDirectorsForFilters(Request $request)
    {
        return DirectorBoard::
            where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('name', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }
}
