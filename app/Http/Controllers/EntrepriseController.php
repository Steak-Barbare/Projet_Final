<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\GestionIdentite;
use App\Models\GestionParc;
use App\Models\Stockage;
use App\Models\Collaboratif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Valider les données entrées par l'utilisateur
    $validatedData = $request->validate([
        'name' => 'required|string',
        'logo' => 'required|image',
        'gestion_identite' => 'required|in:M365,Google Workspace,Microsoft Exchange,Autres',
        'gestion_parc' => 'required|in:MEM,AirWatch,Azure AD,Sans,Autres',
        'stockage' => 'required|in:HDD,One Drive,Dropbox,Non Maîtrisé,Autres',
        'collaboratif' => 'required|in:Teams,Google Meet,Slack,Autres',
    ]);

    // Enregistrer le logo
    $logoPath = $request->file('logo')->store('logos', ['disk' => 'public']);
    

    // Créer une nouvelle instance d'Entreprise
    $entreprise = new Entreprise();
    $entreprise->name = $validatedData['name'];
    $entreprise->logo = $logoPath;
    $entreprise->save();
    

    // Créer une nouvelle instance de GestionIdentite
    $gestionIdentite = new GestionIdentite();
    $gestionIdentite->type = $validatedData['gestion_identite'];
    $entreprise->gestionIdentite()->save($gestionIdentite);

    // Créer une nouvelle instance de GestionParc
    $gestionParc = new GestionParc();
    $gestionParc->type = $validatedData['gestion_parc'];
    $entreprise->gestionParc()->save($gestionParc);

    // Créer une nouvelle instance de Stockage
    $stockage = new Stockage();
    $stockage->type = $validatedData['stockage'];
    $entreprise->stockage()->save($stockage);

    // Créer une nouvelle instance de Collaboratif
    $collaboratif = new Collaboratif();
    $collaboratif->type = $validatedData['collaboratif'];
    $entreprise->collaboratif()->save($collaboratif);

    // Rediriger vers la page de liste des entreprises
    return redirect()->route('entreprise')->with('success', 'Entreprise ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    { // Fonction de recherche
        $search = $request->input('search');      
        $entreprises = Entreprise::with('gestionIdentite', 'gestionParc', 'collaboratif', 'stockage')
        ->orderBy('name', 'asc')
            ->when($search, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->get();
        return view('entreprise', ['entreprises' => $entreprises]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprise.edit', compact('entreprise'));

        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $entreprise = Entreprise::findOrFail($id);
    $entreprise->name = $request->input('name');
    // Mets à jour les autres champs en fonction du modèle d'entreprise
    
    if ($request->hasFile('logo')) {
        // Supprimer l'ancien logo s'il existe
        Storage::disk('public')->delete($entreprise->logo);

        // Enregistrer le nouveau logo
        $logoPath = $request->file('logo')->store('logos', ['disk' => 'public']);
        $entreprise->logo = $logoPath;
    }

    // Récupérer l'instance de GestionIdentite associée à l'entreprise
    $gestionIdentite = $entreprise->gestionIdentite;
    // Mettre à jour les valeurs de GestionIdentite
    $gestionIdentite->type = $request->input('gestion_identite');
    // Récupérer l'instance de Collaboratif associée à l'entreprise
    $collaboratif = $entreprise->collaboratif;
    // Mettre à jour les valeurs de Collaboratif
    $collaboratif->type = $request->input('collaboratif');
    // Récupérer l'instance de Stockage associée à l'entreprise
    $stockage = $entreprise->stockage;
    // Mettre à jour les valeurs de Stockage
    $stockage->type = $request->input('stockage');
    // Récupérer l'instance de GestionParc associée à l'entreprise
    $gestionParc = $entreprise->gestionParc;
    // Mettre à jour les valeurs de GestionParc
    $gestionParc->type = $request->input('gestion_parc');

    $gestionParc->save();
    $stockage->save();
    $collaboratif->save();
    $gestionIdentite->save();
    $entreprise->save();
    return redirect()->route('entreprise')->with('success', 'Entreprise mise à jour avec succès.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $entreprise = Entreprise::findOrFail($id);

        // Supprimer les enregistrements liés dans les tables de gestions
        $entreprise->collaboratif()->delete();
        $entreprise->gestionIdentite()->delete();
        $entreprise->gestionParc()->delete();
        $entreprise->stockage()->delete();   
        // Supprimer l'entreprise elle-même
        $entreprise->delete();
        // Redirection
        return redirect()->route('entreprise')->with('success', 'Entreprise supprimée avec succès.');
}

    }

