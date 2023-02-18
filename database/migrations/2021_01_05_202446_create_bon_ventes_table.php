<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonVentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_ventes', function (Blueprint $table) {
            $table->id();
            $table->integer('NumeroBonVente')->nullable();
            $table->foreignId('client_id')->nullable()->constrained();
            $table->float('montantTotal',8,2)->default(0);
            $table->float('montantPayer',8,2)->default(0);
            $table->float('montantReste',8,2)->default(0);
            $table->boolean('completed')->default(false);
            $table->boolean('bonAnnule')->default(false);
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
        Schema::dropIfExists('bon_ventes');
    }
}
