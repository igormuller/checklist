<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteressadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interested', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cake_id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->boolean('send')->default(false);
            $table->foreign('cake_id')->references('id')->on('cakes');
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
        Schema::dropIfExists('interessados');
    }
}
