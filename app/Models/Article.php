<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['libelle','prix','stock','categorie_id','reference'];



    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id'); // Assurez-vous d'avoir le modèle Categorie importé
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
    
    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class);    }

}
