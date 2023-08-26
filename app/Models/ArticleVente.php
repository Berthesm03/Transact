<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Libelle;
use App\Models\Reference;
use Illuminate\Database\Eloquent\SoftDeletes;



class ArticleVente extends Model
{
    use HasFactory,SoftDeletes;
protected $fillable = ['libelle', 'coutProduction', 'qteStock', 'marge', 'promo',"categorie_id","valeur","reference","prixvente"];

public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }


    
public function libelle()
{
    return $this->belongsTo(Categorie::class, 'libelle_id');
}

public function reference()
{
    return $this->belongsTo(Categorie::class, 'reference_id');
}


public function venteConfection()
    {
        return $this->hasMany(VenteConfection::class, 'articleVente_id');
    }

}
