<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdhesionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('adhesions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userId');
            $table->integer('montantAdhesion');
            $table->date('dateAdhesion')->format('Y-m-d');
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
        Schema::dropIfExists('adhesions');
    }
}
