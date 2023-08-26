<?php
// app/Models/VenteConfection.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenteConfection extends Model
{
    use HasFactory;

    protected $fillable = ['articleVente_id', 'article_id', 'qte'];

    // ... autres propriétés ou méthodes si nécessaires
}
