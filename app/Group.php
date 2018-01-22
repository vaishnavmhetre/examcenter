<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use UuidGen;

    public $incrementing = false;

    protected $fillable = ['name', 'is_admin', 'user_id'];

    public function users(){
        return $this->morphToMany(User::class, 'relation_to', 'role_assignments', 'relation_to_id', 'relation_from_id')->withTimestamps();
    }

    public function categories(){
        return $this->morphToMany(Category::class, 'relation_from', 'role_assignments', 'relation_from_id', 'relation_to_id')->withTimestamps();
    }

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
