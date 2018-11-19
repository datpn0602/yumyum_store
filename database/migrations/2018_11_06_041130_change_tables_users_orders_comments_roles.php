<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTablesUsersOrdersCommentsRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) { 
            $table->string('confirm_password');
        });
        Schema::table('orders', function (Blueprint $table) { 
            $table->integer('user_id')->unsigned()->nullable();
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->text('content')->change();
        });
        Schema::table('roles', function (Blueprint $table) { 
            $table->string('slug')->unique();
            $table->string('permissions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
