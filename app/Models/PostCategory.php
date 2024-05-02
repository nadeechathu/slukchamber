<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostCategory extends Model
{
    use HasFactory, Loggable;
    protected $table = 'post_has_categories';
    /**
     * use class Post
     *
     * @table post_categories
     *
     * @property int $id
     * @property integer $post_id
     * @property integer $category_id

     *
     */

    //values needed to fill
    protected $fillable = [
        'post_id',
        'category_id'
    ];


    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class,'post_id', 'id');
    }   

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'post_has_categories','category_id','post_id');
    }

    public function events() {
        return $this->belongsTo(Post::class,'post_id', 'id')->where('category_id', 1);
    }

    public function news() {
        return $this->belongsTo(Post::class,'post_id', 'id')->where('category_id', 2);
    }

}
