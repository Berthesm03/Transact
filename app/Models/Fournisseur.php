<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['nom','prenom', ];

    // ...



    public function articles()
{
    return $this->belongsToMany(Article::class);}



}



