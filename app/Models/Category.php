<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory, Loggable;

    /**
     * use class Category
     *
     * @table categories
     *
     * @property int $id
     * @property string $name
     * @property text $short_description
     * @property text $description
     * @property string $slug
     * @property boolean $status  active => 1, inactive => 0
     * @property text $meta_title
     * @property text $meta_description
     * @property string $meta_keywords
     * @property string $canonical_url
     * @property integer $type
     * @property integer $parent_id
     *
     */

    //values needed to fill
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'slug',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'type',
        'parent_id'
    ];


    public function categoryImages()
    {
        return $this->hasMany(CategoryImage::class);
    }

    public function postCategory(){
        
        return $this->hasMany(PostCategory::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_has_categories');
    }

    public static function getAllCategoriesForFilters(Request $request)
    {
        return Category::with('categoryImages', 'postCategory', 'posts')
            ->where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('name', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

}
