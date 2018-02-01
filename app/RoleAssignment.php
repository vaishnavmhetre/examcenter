<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

/**
 * App\RoleAssignment
 *
 * @property string $id
 * @property string $relation_from_id
 * @property string $relation_from_type
 * @property string $relation_to_id
 * @property string $relation_to_type
 * @property string|null $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereRelationFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereRelationFromType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereRelationToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereRelationToType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoleAssignment whereUserId($value)
 * @mixin \Eloquent
 */
class RoleAssignment extends MorphPivot
{
    protected $table = 'role_assignments';
    protected $fillable = ['id', 'relation_from_id', 'relation_from_type', 'relation_to_id', 'relation_to_type', 'user_id'];

}
