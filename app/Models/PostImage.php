<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class PostImage extends Model
{
    use HasFactory, Loggable;

    /**
     * use class PostImage
     *
     * @table posts_images
     *
     * @property integer $id
     * @property integer $post_id
     * @property string $banner_image
     * @property integer $type
     * @property boolean $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'post_id',
        'banner_image',
        'type',
        'status'
    ];


    public  function post() {
        return $this->belongsTo(Post::class, 'post_id','id');
    }
}
