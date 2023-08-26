<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('article_ventes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id'); // Ajout de la colonne categorie_id
            $table->string('libelle');
            $table->decimal('coutProduction', 8, 2);
            $table->integer('qteStock');
            $table->decimal('marge', 8, 2);
            $table->string('promo')->nullable();
            $table->string('valeur'); // Ajout de la colonne valeur
            $table->string('reference'); // Ajout de la colonne reference
            $table->string('photo')->nullable(); // Ajout de la colonne photo (nullable)
            $table->decimal('prixVente', 8, 2); // Ajout de la colonne prixvente
            $table->softDeletes();
            $table->timestamps();

            
            // Définition de la clé étrangère
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('libelle')->references('libelle')->on('articles');
            $table->foreign('reference')->references('reference')->on('articles');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('article_ventes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }


   
};
