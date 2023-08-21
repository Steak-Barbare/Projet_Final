<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_entreprise',
        'hdd',
        'onedrive',
        'dropbox',
        'nonmaitrise',
        'autres'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_entreprise');
    }
}
