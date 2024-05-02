<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'inquiry_email', 'phone', 'inquiry_subject', 'inquiry_message', 'status'];

    public static function getAllInquiriesForFilters(Request $request)
    {
        return Inquiry::
            where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('full_name', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }
}
