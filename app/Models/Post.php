<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Http\Request;

class Post extends Model
{
    use HasFactory, Loggable;

    /**
     * use class Post
     *
     * @table posts
     *
     * @property int $id
     * @property string $title
     * @property text $short_description
     * @property longtext $description
     * @property string $slug
     * @property date $published_date
     * @property bool $status             active => 1, inactive => 0
     *
     */

    //values needed to fill
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'slug',
        'status'
    ];

    protected $dates = [
        'published_date'
    ];

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_has_categories');
    }


    public static function getAllPostsForFilters(Request $request)
    {
        return Post::with('postImages', 'categories')
            ->where(function($query) use($request){

                if($request->selectedDate != null){

                    $query->where('published_date', 'like', '%'.$request->selectedDate.'%');
                }else{
                    $query;
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->where('title', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

}
