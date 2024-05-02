<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComponentHasElement extends Model
{
    use HasFactory, Loggable;

    protected $table = ['component_has_elements'];

    /**
     * use class Post
     *
     * @table component_elements
     *
     * @property int $id
     * @property unsignedBigInteger $component_id
     * @property unsignedBigInteger $element_id
     * @property boolean $status
     */

    //values needed to fill
    protected $fillable = [
        'component_id',
        'element_id'
    ];


    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class,'component_id', 'id');
    }

    public function element(): BelongsTo
    {
        return $this->belongsTo(Element::class,'element_id', 'id');
    }

}
