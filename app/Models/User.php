<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\StatusEnum;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Loggable;

    /**
     * use class User
     *
     * @table users
     *
     * @property int $id
     * @property string $name
     * @property email $email
     * @property string $password
     * @property string $image
     * @property integer $status
     *
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all users for filters
     */
    public static function getUsersForFilters(Request $request){

        return User::where(function($query) use($request){

            if($request->searchKey != null){

                $query->where('name','like','%'.$request->searchKey.'%')
                ->orWhere('email','like',''.$request->searchKey.'');

            }else{

                $query;
            }

        })->paginate(env("RECORDS_PER_PAGE"));
    }

}
