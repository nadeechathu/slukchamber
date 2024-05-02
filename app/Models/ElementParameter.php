<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElementParameter extends Model
{
    use HasFactory, Loggable;

    protected $table = 'element_has_parameters';
    /**
     * use class Element
     *
     * @table element_has_parameters
     *
     * @property int $id
     * @property integer $element_id
     * @property integer $parameter_id

     *
     */

    //values needed to fill
    protected $fillable = [
        'element_id',
        'parameter_id'
    ];

    public function parameter():BelongsTo
    {
        return $this->belongsTo(Parameter::class, 'parameter_id', 'id');
    }
}
