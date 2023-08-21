<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
         <title>Rapports</title>
            <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight&family=Knewave&display=swap" rel="stylesheet"> 
        <!--Icon-->
    <link rel="icon" type="image/x-icon" href="\img\Capturemini.JPG">
        <!--Feuille de Style-->
    <link rel="stylesheet" href="{{ asset('/style.css') }}">
        <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        @if (Auth::user()->access)
            <x-header/>

        <h1 class="padd">Nombre total d'entreprises : {{ $totalEntreprises }}</h1>

<div class="graph">
            <!--Indicateur Chart Js Gestion Identité-->

            <div style="width:500px;" class="rapgest">
                <h1 class="card-title">Gestion d'identité </h1>    
            <canvas id="chart" ></canvas>
            <div class="percentage">
            @foreach($countsGestionIdentite as $count)
                        <p class="padd">{{ $count->type }} : ({{ number_format($count->percentage, 2) }} %)</p>
                    @endforeach
            </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showM365Companies()">Entreprise(s) ayant M365 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="m365Companies" style="display: none;">
                            @foreach ($m365Entreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showGoogleWorkspaceCompanies()">Entreprise(s) ayant Google Workspace 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                            <div id="googleWorkspace" style="display: none">
                            @foreach ($googleWorkspaceEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach 
                             </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showMicrosoftExchangeCompanies()">Entreprise(s) ayant Microsoft Exchange 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                            <div id="microsoftExchange" style="display: none">
                            @foreach ($microsoftExchangeEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                            </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAutresIdentCompanies()">Autres 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="autresIdent" style="display: none">
                            @foreach ($autresEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>
                    </div>
            </div>

            <!--Indicateur Chart Js Gestion Parc-->

            <div style="width:500px;" class="rapgest">
                <h1 class="card-title ">Gestion de Parc :</h1>    
            <canvas id="chartParc" ></canvas>
            <div class="percentage">
            @foreach($countsGestionParc as $count)
                        <p class="padd">{{ $count->type }} : ({{ number_format($count->percentage, 2) }} %)</p>
                    @endforeach
            </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showMemCompanies()">Entreprise(s) ayant MEM 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="mem" style="display: none">
                            @foreach ($memEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAirwatchCompanies()">Entreprise(s) ayant AirWatch 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="airWatch" style="display: none">
                            @foreach ($airWatchEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAzureCompanies()">Entreprise(s) ayant Azure AD 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="azureAD" style="display: none">
                            @foreach ($azureAdEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showSansGestCompanies()">Sans Gestion de Parc
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="sansGest" style="display: none">
                            @foreach ($sansEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>   
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAutresGestCompanies()">Autres 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="autresParc" style="display: none">
                            @foreach ($autresParcEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
            </div>

            <!--Indicateur Chart Js Gestion Collaboratif-->

            <div style="width:500px;" class="rapgest">
                <h1 class="card-title">Gestion Collaborative :</h1>    
            <canvas id="chartCollab" ></canvas>
            <div class="percentage">
            <!--Affiche le nombres d'entreprises liées à la table Collaboratif, ainsi que le type utilisé (également en pourcentage limité à 2 chiffres après la virgule) -->                
            @foreach($countsCollaboratif as $count)
                        <p class="padd">{{ $count->type }} : ({{ number_format($count->percentage, 2) }} %)</p>
                    @endforeach
            </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showTeamsCompanies()">Entreprise(s) ayant Teams 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="teams" style="display: none">
                            @foreach ($teamsEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach 
                        </div>     
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showGoogleMeetCompanies()">Entreprise(s) ayant Google Meet 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="googleMeet" style="display: none">
                            @foreach ($googleMeetEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showSlackCompanies()">Entreprise(s) ayant Slack 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="slack" style="display: none">
                            @foreach ($slackEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach
                        </div>      
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAutresCollabCompanies()">Autres 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="autresCollab" style="display: none">
                            @foreach ($autresCollabEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
            </div>



            <!--Indicateur Chart Js Stockage-->

            <div style="width:500px;" class="rapgest">
                <h1 class="card-title">Stockage :</h1>    
            <canvas id="chartStockage" ></canvas>
            <div class="percentage">
            <!--Affiche le nombres d'entreprises liées à la table Collaboratif, ainsi que le type utilisé (également en pourcentage limité à 2 chiffres après la virgule) -->                
            @foreach($countsStockage as $count)
                        <p class="padd">{{ $count->type }} : ({{ number_format($count->percentage, 2) }} %)</p>
                    @endforeach
            </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showHddCompanies()">Entreprise(s) ayant un HDD
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="hdd" style="display: none">
                            @foreach ($hddEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showOneDriveCompanies()">Entreprise(s) ayant One Drive 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="oneDrive" style="display: none">
                            @foreach ($oneDriveEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showDropBoxCompanies()">Entreprise(s) ayant Dropbox 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                            <div id="dropBox" style="display: none">
                            @foreach ($dropBoxEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                            </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showNonMaitriseCompanies()">Non Maîtrisé 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                            <div id="nonMaitrise" style="display: none">
                            @foreach ($nonMaitriseEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                            </div>
                    </div>
                    <div>
                        <h3 class="m-bottom card-title cursor" onclick="showAutresStockageCompanies()">Autres 
                            <i class="fa fa-chevron-down"></i>
                        </h3>  
                        <div id="autresStockage" style="display: none">
                            @foreach ($autresStockageEntreprises as $entreprise)
                                <p class="padd">{{ $entreprise->name }}</p>
                            @endforeach  
                        </div>    
                    </div>
            </div>
            
</div>

        <footer>
            <p class="copyright">VaultApp by David Ltd®</p>
        </footer>

        <div id="scroll-to-top">
            <a href="#top"><img src="\img\arrow-up-solid.svg" alt="Flèche vers le haut"></a>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const data = {!! json_encode($data) !!};
            const labels = {!! json_encode($labels) !!}; 

            const dataParc = {!! json_encode($dataParc) !!};
            const labelsParc = {!! json_encode($labelsParc) !!};    
            
            const dataCollab = {!! json_encode($dataCollab) !!};
            const labelsCollab = {!! json_encode($labelsCollab) !!};

            const dataStockage = {!! json_encode($dataStockage) !!};
            const labelsStockage = {!! json_encode($labelsStockage) !!};
        </script>
        <script src="{{ asset('/chart-config.js') }}"></script>
        <script src="{{ asset('/arrow.js') }}"></script>
        <script src="{{ asset('/detail.js') }}"></script>
        
        @else
        <div class="message">
            <div class="cont-message">
        <p style="display: flex; text-align:center; font-size:2rem; padding:1rem;">Votre demande a été enregistrée avec succès. Nous vous remercions pour votre patience pendant que nous la traitons.</p>
        <form method="POST" action="{{ route('logout') }}" style="justify-content: center;
                display: flex;">
                    @csrf
                <x-dropdown-link :href="route('logout')" class="access"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <i class="fa fa-arrow-left"></i>
                                {{ __('Retour') }}
                            </x-dropdown-link>
                </form>
                </div>
             </div>   
        @endif
    </body>
</html>