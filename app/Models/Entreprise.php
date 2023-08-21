<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'logo'];

    public function gestionIdentite()
    {
        return $this->hasOne(GestionIdentite::class, 'entreprise_id');
    }

    public function collaboratif()
    {
        return $this->hasOne(Collaboratif::class, 'entreprise_id');
    }

    public function gestionParc()
    {
        return $this->hasOne(GestionParc::class, 'entreprise_id');
    }

    public function stockage()
    {
        return $this->hasOne(Stockage::class, 'entreprise_id');
    }
}
