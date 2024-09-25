<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBytes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bytes', function (Blueprint $table) {
            $table->id();
            $table->boolean('byte0');
            $table->boolean('byte1');
            $table->boolean('byte2');
            $table->boolean('byte3');
            $table->boolean('byte4');
            $table->boolean('byte5');
            $table->boolean('byte6');
            $table->boolean('byte7');
            $table->integer('decimal');
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
        Schema::dropIfExists('bytes');
    }
}
