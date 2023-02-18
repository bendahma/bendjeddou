<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->float('prixAchat',8,2)->nullable();
            $table->float('prixVenteGros',8,2)->nullable();
            $table->boolean('discount')->default(false);
            $table->integer('remise')->default(0);
            $table->date('dateDebutReduction')->nullable();
            $table->date('dateFinReduction')->nullable();
            $table->foreignId('product_id')->constrained();
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
        Schema::dropIfExists('prices');
    }
}
