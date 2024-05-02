<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageHasComponent extends Model
{
    use HasFactory , Loggable;

    /**
     * use class PageHasComponent
     *
     * @table page_has_component
     *
     * @property UnsignBiginteger $page_id
     * @property unsignedBigInteger $component_id
     * @property integer $sort_order
     * @property integer $status
     *
     */

    //values needed to fill
    protected $fillable = [
        'page_id',
        'component_id',
        'sort_order',
        'status'
    ];

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class,'component_id', 'id');
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class,'page_id', 'id');
    }

}
