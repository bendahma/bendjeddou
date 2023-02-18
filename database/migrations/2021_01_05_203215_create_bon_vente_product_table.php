<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonVenteProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_vente_product', function (Blueprint $table) {
            $table->foreignId('bon_vente_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained();
            $table->integer('quantite')->nullable();
            $table->float('prixVente',8,2)->nullable();
            $table->float('montantTotal',8,2)->nullable();
            $table->float('montantGained',8,2)->nullable();
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
        Schema::table('bon_vente_product', function (Blueprint $table) {
            Schema::dropIfExists('bon_vente_product');
        });
    }
}
