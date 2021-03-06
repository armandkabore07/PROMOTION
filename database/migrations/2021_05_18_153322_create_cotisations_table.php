<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->integer('montantPayer');
            $table->integer('montantRestant');
            $table->year('annee');
            $table->date('dateCotisation')->format('Y-m-d');
            $table->timestamps();
            $table->foreign('userId')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotisations');
    }
}
