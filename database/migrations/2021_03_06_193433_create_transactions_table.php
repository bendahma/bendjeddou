<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroFacture')->nullable() ;
            $table->date('dateFacture')->nullable() ;
            $table->float('montantTotal',8,2)->default(0) ;
            $table->float('montantPayer',8,2)->default(0) ;
            $table->float('montantReste',8,2)->default(0) ;
            $table->foreignId('fournisseur_id')->constrained();
            // $table->json('products')->nullable(); ;
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
        Schema::dropIfExists('transactions');
    }
}
