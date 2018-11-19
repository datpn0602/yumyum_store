<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAllTableAddColumnDeleteAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->softDeletes();
        });
        Schema::table('foods', function ($table) {
            $table->softDeletes();
        });
        Schema::table('food_types', function ($table) {
            $table->softDeletes();
        });
        Schema::table('orders', function ($table) {
            $table->softDeletes();
        });
        Schema::table('promotions', function ($table) {
            $table->softDeletes();
        });
        Schema::table('comments', function ($table) {
            $table->softDeletes();
        });
        Schema::table('reviews', function ($table) {
            $table->softDeletes();
        });
        Schema::table('roles', function ($table) {
            $table->softDeletes();
        });
        Schema::table('foods', function($table) {
            $table->dropColumn('category_id');
        });
        Schema::table('order_food', function ($table) {
            $table->softDeletes();
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
