<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{

    use HasFactory, Loggable;

    /**
     * use class GalleryImage
     *
     * @table gallery_images
     *
     * @property int $id
     * @property string $image_src
     * @property int $status
     * @property string $alt_text
     * @property string $caption
     *
     */

    //values needed to fill
    protected $fillable = [
        'image_src',
        'status',
        'alt_text',
        'caption'
    ];

    public static function getGalleryImagesForFilters($request)
    {
        return GalleryImage::where(function ($query) use ($request) {
            if ($request->searchKey != null) {
                $query->where('alt_text', 'like', '%' . $request->searchKey . '%');
            } else {
                $query;
            }
        })->paginate(env("RECORDS_PER_PAGE"));
    }

}
