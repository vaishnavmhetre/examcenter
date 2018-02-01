<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property string $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string|null $user_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $createdCategories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $createdGroups
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $createdUsers
 * @property-read \App\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUserId($value)
 * @mixin \Eloquent
 */
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

    public function name_1(){
        return "{$this->first_name}";
    }

    public function name_2(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function name_3(){
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function link(){
        return '#';
    }
}