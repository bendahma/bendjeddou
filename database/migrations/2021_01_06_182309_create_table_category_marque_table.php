<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategoryMarqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_marque', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();
            $table->foreignId('marque_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_marque', function (Blueprint $table) {
            Schema::dropIfExists('category_marque');
        });
    }
}
