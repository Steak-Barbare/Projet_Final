<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionParc extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_entreprise',
        'mem',
        'airwatch',
        'azureAD',
        'autres'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
