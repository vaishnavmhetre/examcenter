<?php

namespace App;

use App\Helpers\UuidGen;
use Illuminate\Database\Eloquent\Model;

class RoleAssignment extends Model
{
    use UuidGen;

    public $incrementing = false;

    protected $fillable = ['id', 'relation_from_id', 'relation_from_type', 'relation_to_id', 'relation_to_type', 'user_id'];
}
