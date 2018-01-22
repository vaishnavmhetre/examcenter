<?php

use Illuminate\Database\Seeder;

class RoleAssignmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\RoleAssignment::class, 1)->create([
            'relation_from_id' => \App\Group::first()->id,
            'relation_from_type' => \App\Group::class,
            'relation_to_id' => \App\Category::first()->id,
            'relation_to_type' => \App\Category::class
        ]);

        factory(\App\RoleAssignment::class, 1)->create([
            'relation_from_id' => \App\User::first()->id,
            'relation_from_type' => \App\User::class,
            'relation_to_id' => \App\Group::first()->id,
            'relation_to_type' => \App\Group::class
        ]);
    }
}
