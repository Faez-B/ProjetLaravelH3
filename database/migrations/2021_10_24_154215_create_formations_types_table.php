<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("formation")->index();
            $table->unsignedBigInteger("type")->index();

            $table->foreign("formation")->references("id")->on("formations");
            $table->foreign("type")->references("id")->on("type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations_types');
    }
}
