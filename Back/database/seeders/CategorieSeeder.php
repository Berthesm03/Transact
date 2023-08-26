<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['libelle' => 'Chemises'],
            ['libelle' => 'Boutons'],
            // ... Ajoutez d'autres catégories ici
        ]);
    }
    

}
