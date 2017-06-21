<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingDefaultValuesToPlacesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::table('places', function (Blueprint $table) {
        //     $table->integer('rating')->default(5)->change();
        //     $table->integer('average_price')->default(3)->change();
        //     $table->text('description')->nullable()->default('No description')->change();
        //     $table->string('phone')->nullable()->change();
        //     $table->string('address')->change();
        //     $table->string('work_hours')->nullable()->change();
        //     $table->string('image')->default('default.jpg')->change();
        //     $table->string('website')->nullable()->change();
        //     $table->boolean('published')->default('0')->change();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // Schema::dropIfExists('places');
    }
}
