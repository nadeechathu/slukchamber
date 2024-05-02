<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermissionHistory extends Model
{
    use HasFactory , Loggable;

    /**
     * use class RolePermissionHistory
     *
     * @table role_permission_histories
     *
     * @property unsignedBigInteger $role_id
     * @property unsignedBigInteger $permission_id
     *
     */

    //values needed to fill
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
}
