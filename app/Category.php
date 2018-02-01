<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property string $id
 * @property string $name
 * @property string $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUserId($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use UuidGen;

    public $incrementing = false;

    protected $fillable = ['name', 'user_id'];

    public function groups()
    {
        return $this->morphToMany(Group::class, 'relation_to', 'role_assignments', 'relation_to_id', 'relation_from_id')->orderBy('name')->withTimestamps();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function link()
    {
        return route('categories.show', ['category' => $this->id]);
    }

}
