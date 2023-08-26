<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenteConfectionTable extends Migration
{
    public function up()
    {
        Schema::create('vente_confections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleVente_id');
            $table->unsignedBigInteger('article_id');
            $table->integer('qte'); // Quantité associée à la vente et la confection
            $table->timestamps(); // Ajoute les colonnes created_at et updated_at

            $table->foreign('articleVente_id')->references('id')->on('article_ventes')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('article')->onDelete('cascade');
            // ... Autres colonnes et timestamps si nécessaire
        });
    }

    public function down()
    {
        Schema::dropIfExists('vente_confections');
    }
}
