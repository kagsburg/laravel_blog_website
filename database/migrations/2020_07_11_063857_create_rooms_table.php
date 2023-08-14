<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->string('photo')->nullable();
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->float('price');
            $table->float('discount')->nullable();
            $table->boolean('is_featured')->deault(false);
            $table->longText('amenities')->nullable();
            $table->unsignedBigInteger('amenities_id')->nullable();
            $table->foreign('amenities_id')->references('id')->on('amenities')->onDelete('SET NULL');
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
        Schema::dropIfExists('rooms');
    }
}
