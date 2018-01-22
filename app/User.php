<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, UuidGen;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'email', 'password', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $incrementing = false;

    public function groups(){
        return $this->morphToMany(Group::class, 'relation_from', 'role_assignments', 'relation_from_id', 'relation_to_id')->withTimestamps();
    }

    public function createdGroups(){
        return $this->hasMany(Group::class);
    }

    public function createdCategories(){
        return $this->hasMany(Category::class);
    }

    public function createdUsers(){
        return $this->hasMany(User::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
