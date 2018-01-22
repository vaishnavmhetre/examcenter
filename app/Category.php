<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UuidGen;

    public $incrementing = false;

    protected $fillable = ['name', 'user_id'];

    public function groups(){
        return $this->morphToMany(Group::class, 'relation_to', 'role_assignments', 'relation_to_id', 'relation_from_id')->orderBy('name')->withTimestamps();
    }

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
