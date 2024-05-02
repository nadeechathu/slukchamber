<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory , Loggable;

    /**
     * use class Page
     *
     * @table pages
     *
     * @property integer $id
     * @property string $title
     * @property string $slug
     * @property string $meta_title
     * @property string $meta_description
     * @property string $canonical_url
     * @property string $keywords
     * @property integer $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'canonical_url',
        'keywords',
        'status'
    ];

    public function components(){
        return $this->belongsToMany(Component::class, 'page_has_components')->withPivot('sort_order')->orderByPivot('sort_order');
    }

    public function pageComponents(){

        return $this->belongsToMany(Component::class, 'page_has_components')->with('componentElements','commonName')->where('components.status',1);
    }

    public static function getAllPagesForFilters($request)
    {
        return Page::with('components')
            ->where(function ($query) use ($request) {
                if ($request->searchKey != null) {
                    $query->orWhere('title', 'like', '%' . $request->searchKey . '%')
                    ->orWhere('slug', 'like', '%' . $request->searchKey . '%');
                } else {
                    $query;
                }
            })->paginate(env("RECORDS_PER_PAGE"));
    }

    public static function getPageContentsForSlug($slug){

        return Page::with('pageComponents')->where('slug',$slug)->get()->first();
    }

}
