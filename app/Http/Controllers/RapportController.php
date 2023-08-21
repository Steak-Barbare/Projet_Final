<?php

namespace App\Http\Controllers;

use App\Models\Collaboratif;
use Illuminate\Http\Request;

use App\Models\Entreprise;
use App\Models\GestionIdentite;
use App\Models\GestionParc;
use App\Models\Stockage;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    public function rapport()
{

     // Compter le nombre total d'entreprises
    $totalEntreprises = Entreprise::count();

    // Compter le nombre d'entreprises par type de gestion d'identité
    $countsGestionIdentite = GestionIdentite::select('type', DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->get();

    // Trier les résultats par ordre décroissant du nombre d'entreprises
    $countsGestionIdentite = $countsGestionIdentite->sortByDesc('count');

     // Calculer le pourcentage pour chaque type de gestion d'identité
     foreach ($countsGestionIdentite as $count) {
        $count->percentage = ($count->count / $totalEntreprises) * 100;
    }
    
    // Compter le nombre d'entreprises par type de gestion de parc
        $countsGestionParc = GestionParc::select('type', DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->get();

        $countsGestionParc = $countsGestionParc->sortByDesc('count');

        foreach ($countsGestionParc as $count) {
            $count->percentage = ($count->count / $totalEntreprises) * 100;
        }

        // Compter le nombre d'entreprises par type de gestion collaborative
        $countsCollaboratif = Collaboratif::select('type', DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->get();

        $countsCollaboratif = $countsCollaboratif->sortByDesc('count');

        foreach ($countsCollaboratif as $count) {
            $count->percentage = ($count->count / $totalEntreprises) * 100;
        }

        // Compter le nombre d'entreprises par type de Stockage
        $countsStockage = Stockage::select('type', DB::raw('COUNT(*) as count'))
        ->groupBy('type')
        ->get();
        
        $countsStockage = $countsStockage->sortByDesc('count');

        foreach ($countsStockage as $count) {
            $count->percentage = ($count->count / $totalEntreprises) * 100;
        }

        // Test Indicateur Gestion Identite : 
        $m365Entreprises = Entreprise::whereHas('gestionIdentite', function ($query) {
            $query->where('type', 'M365');
        })->get();
        
        $googleWorkspaceEntreprises = Entreprise::whereHas('gestionIdentite', function ($query) {
            $query->where('type', 'Google Workspace');
        })->get();

        $microsoftExchangeEntreprises = Entreprise::whereHas('gestionIdentite', function ($query) {
            $query->where('type', 'Microsoft Exchange');
        })->get();

        $autresEntreprises = Entreprise::whereHas('gestionIdentite', function ($query) {
            $query->where('type', 'Autres');
        })->get();

        // Récup du nombres d'entreprises et leur types de Gestion d'identité pour la page rapport
        $m365Count = GestionIdentite::where('type', 'M365')->count();
        $googleWorkspaceCount = GestionIdentite::where('type', 'Google Workspace')->count();
        $microsoftExchangeCount = GestionIdentite::where('type', 'Microsoft Exchange')->count();
        $autresCount = GestionIdentite::where('type', 'Autres')->count();
        // Data pour l'indicateur google charts
        $labels = ['M365', 'Google Workspace', 'Microsoft Exchange', 'Autres']; 
        $data = [$m365Count, $googleWorkspaceCount, $microsoftExchangeCount, $autresCount]; 



        // Test Indicateur Gestion Parc : 
        $memEntreprises = Entreprise::whereHas('gestionParc', function ($query) {
            $query->where('type', 'MEM');
        })->get();
        
        $airWatchEntreprises = Entreprise::whereHas('gestionParc', function ($query) {
            $query->where('type', 'AirWatch');
        })->get();

        $azureAdEntreprises = Entreprise::whereHas('gestionParc', function ($query) {
            $query->where('type', 'Azure AD');
        })->get();

        $sansEntreprises = Entreprise::whereHas('gestionParc', function ($query) {
            $query->where('type', 'Sans');
        })->get();

        $autresParcEntreprises = Entreprise::whereHas('gestionParc', function ($query) {
            $query->where('type', 'Autres');
        })->get();

        // Récup du nombres d'entreprises et leur types de Gestion de Parc pour la page rapport
        $memCount = GestionParc::where('type', 'MEM')->count();
        $airWatchCount = GestionParc::where('type', 'AirWatch')->count();
        $azureAdCount = GestionParc::where('type', 'Azure AD')->count();
        $sansCount = GestionParc::where('type', 'Sans')->count();
        $autresCountParc = GestionParc::where('type', 'Autres')->count();
        // Data pour l'indicateur google charts
        $labelsParc = ['MEM', 'AirWatch', 'Azure AD', 'Sans', 'Autres'];
        $dataParc = [$memCount, $airWatchCount, $azureAdCount, $sansCount, $autresCountParc];


        // Test Indicateur Collaboratif

        $teamsEntreprises = Entreprise::whereHas('collaboratif', function ($query) {
            $query->where('type', 'Teams');
        })->get();
        
        $googleMeetEntreprises = Entreprise::whereHas('collaboratif', function ($query) {
            $query->where('type', 'Google Meet');
        })->get();

        $slackEntreprises = Entreprise::whereHas('collaboratif', function ($query) {
            $query->where('type', 'Slack');
        })->get();

        $autresCollabEntreprises = Entreprise::whereHas('collaboratif', function ($query) {
            $query->where('type', 'Autres');
        })->get();


        // Récup du nombres d'entreprises et leur types de Gestion Collaboratives pour la page rapport
        $teamsCount = Collaboratif::where('type', 'Teams')->count();
        $googleMeetCount = Collaboratif::where('type', 'Google Meet')->count();
        $slackCount = Collaboratif::where('type', 'Slack')->count();
        $autresCountCollab = Collaboratif::where('type', 'Autres')->count();
        // Data pour l'indicateur google charts
        $labelsCollab = ['Teams', 'Google Meet', 'Slack', 'Autres'];
        $dataCollab = [$teamsCount, $googleMeetCount, $slackCount, $autresCountCollab];


        // Test Indicateur Stockage

        $hddEntreprises = Entreprise::whereHas('stockage', function ($query) {
            $query->where('type', 'HDD');
        })->get();
        
        $oneDriveEntreprises = Entreprise::whereHas('stockage', function ($query) {
            $query->where('type', 'One Drive');
        })->get();

        $dropBoxEntreprises = Entreprise::whereHas('stockage', function ($query) {
            $query->where('type', 'Dropbox');
        })->get();

        $nonMaitriseEntreprises = Entreprise::whereHas('stockage', function ($query) {
            $query->where('type', 'Non Maîtrisé');
        })->get();

        $autresStockageEntreprises = Entreprise::whereHas('stockage', function ($query) {
            $query->where('type', 'Autres');
        })->get();

        // Récup du nombres d'entreprises et leur types de Stockage pour la page rapport
        $hddCount = Stockage::where('type', 'HDD')->count();
        $oneDriveCount = Stockage::where('type', 'One Drive')->count();
        $dropBoxCount = Stockage::where('type', 'Dropbox')->count();
        $nonMaitriseCount = Stockage::where('type', 'Non Maîtrisé')->count();
        $autresCountStockage = Stockage::where('type', 'Autres')->count();
        // Data pour l'indicateur google charts
        $labelsStockage = ['HDD', 'One Drive', 'Dropbox', 'Non Maîtrisé', 'Autres'];
        $dataStockage = [$hddCount, $oneDriveCount, $dropBoxCount, $nonMaitriseCount, $autresCountStockage];






    // Passer les résultats à la vue "rapport"
    return view('rapport', compact('countsGestionIdentite', 'countsGestionParc', 'countsCollaboratif', 'countsStockage', 
    'totalEntreprises',
    'm365Entreprises', 'googleWorkspaceEntreprises', 'microsoftExchangeEntreprises','autresEntreprises',
    'labels', 'data',
    'labelsParc','dataParc',
    'memEntreprises','airWatchEntreprises', 'azureAdEntreprises', 'sansEntreprises', 'autresParcEntreprises',
    'teamsEntreprises', 'googleMeetEntreprises', 'slackEntreprises', 'autresCollabEntreprises',
    'labelsCollab', 'dataCollab',
    'hddEntreprises', 'oneDriveEntreprises', 'dropBoxEntreprises', 'nonMaitriseEntreprises', 'autresStockageEntreprises',
    'labelsStockage','dataStockage'
));
    //return view('rapport', compact('m365Entreprises', 'googleWorkspaceEntreprises', 'microsoftExchangeEntreprises','autresEntreprises'));

}
}
