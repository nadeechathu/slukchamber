<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Service extends Model
{
    use HasFactory , Loggable;

    /**
     * use class Service
     *
     * @table services
     *
     * @property integer $id
     * @property string $title
     * @property text $short_description
     * @property longtext $description
     * @property string $slug
     * @property text $meta_description
     * @property string $meta_title
     * @property string $keywords
     * @property string $canonical_url
     * @property integer $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'meta_description',
        'meta_title',
        'keywords',
        'canonical_url',
        'slug',
        'status'
    ];

    public function service_images()
    {
        return $this->hasOne(ServiceImage::class);
    }

    public static function getAllServicesForFilters(Request $request)
    {
        return Service::with('service_images')
            ->where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('title', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

}
