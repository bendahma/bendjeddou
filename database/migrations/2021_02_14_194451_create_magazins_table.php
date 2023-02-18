<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagazinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->text('commune')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('fix')->nullable();
            $table->string('NIF')->nullable();
            $table->string('NFiscal')->nullable();
            $table->string('registreCommerce')->nullable();
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
        Schema::dropIfExists('magazins');
    }
}
