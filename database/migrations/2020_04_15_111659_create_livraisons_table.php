<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('montantLivraison');
            $table->date('dateLivraison');
            $table->date('villeLivraison');
            $table->date('quartierLivraison');
            $table->string('lieuxLivraison');
            $table->boolean('etatLivraison')->default(0);
            $table->integer('idCommande');
            $table->foreign('idCommande')->references('id')->on('commandes');
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
        Schema::dropIfExists('livraisons');
    }
}
