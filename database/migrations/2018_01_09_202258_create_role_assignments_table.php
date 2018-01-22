<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_assignments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('relation_from_id');
            $table->string('relation_from_type');
            $table->uuid('relation_to_id');
            $table->string('relation_to_type');
            $table->uuid('user_id')->nullable();
            /*$table->foreign('user_id')
                ->references('id')
                ->on('users');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_assignments');
    }
}
