<?php

namespace App\Models;

use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionIdentite extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'm365',
        'google_workspace',
        'microsoft_exchange',
        'autres'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
}
