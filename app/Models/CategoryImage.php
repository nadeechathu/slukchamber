<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    use HasFactory, Loggable;
   
    /**
     * use class CategoryImage
     *
     * @table category_images
     *
     * @property integer $id
     * @property integer $category_id
     * @property string $banner_image
     * @property integer $type
     * @property boolean $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'category_id',
        'banner_image',
        'type',
        'status'
    ];


    public  function category() {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
