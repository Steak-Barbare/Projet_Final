<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboratif extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_entreprise',
        'teams',
        'googlemeet',
        'slack',
        'autres'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
