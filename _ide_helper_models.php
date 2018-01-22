<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
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
 */
	class Category extends \Eloquent {}
}

namespace App{
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
 */
	class User extends \Eloquent {}
}

namespace App{
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
 */
	class Group extends \Eloquent {}
}

namespace App{
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
 */
	class RoleAssignment extends \Eloquent {}
}

