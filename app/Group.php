<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Group
 *
 * @property string $id
 * @property string $name
 * @property int $is_admin
 * @property string $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUserId($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use UuidGen;

    public $incrementing = false;

    protected $fillable = ['name', 'is_admin', 'user_id'];

    public function users()
    {
        return $this->morphToMany(User::class, 'relation_to', 'role_assignments', 'relation_to_id', 'relation_from_id')->withTimestamps();
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'relation_from', 'role_assignments', 'relation_from_id', 'relation_to_id')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function link()
    {
        return '#';
    }

}
