<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory , Loggable;

    /**
     * use class ServiceImages
     *
     * @table service_images
     *
     * @property integer $id
     * @property string $title
     * @property integer $service_id
     * @property string $banner_image
     * @property integer $type
     * @property integer $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'title',
        'service_id',
        'banner_image',
        'type',
        'status'
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
