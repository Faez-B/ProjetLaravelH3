<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category")->index();
            $table->unsignedBigInteger("formation")->index();
            
            $table->foreign("formation")->references("id")->on("formations")
                    ->onDelete("CASCADE");
            $table->foreign("category")->references("id")->on("categories")
                    ->onDelete("CASCADE");
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations_categories');
    }
}
