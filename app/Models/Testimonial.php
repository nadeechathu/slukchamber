<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Testimonial extends Model
{
    use HasFactory, Loggable;
      /**
     * use class Testimonial
     *
     * @table Testimonials
     *
     * @property int $id
     * @property string $title
     * @property longtext $description
     * @property string $slug
     * @property integer $status
     *
    */

    //values needed to fill
    protected $fillable = [
        'title',
        'description',
        'slug',
        'status'
    ];

    public static function getAllTestimonialsForFilters(Request $request)
    {
        return Testimonial::where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('title', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

}
