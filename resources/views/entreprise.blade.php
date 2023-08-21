<!DOCTYPE html>
<html>
<head>
    <title>Entreprises</title>
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
    <!--Message quand Ajout/Modif/Suppr une entreprise-->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div>
        <h1 class="padd">Liste des entreprises :</h1>
       
        <!--Fonction Recherche Entreprise-->
        <div class="search-form">
            <form action="{{ route('entreprise') }}" method="GET">
                <input type="text" name="search" placeholder="Rechercher une entreprise">
                <button type="submit">Rechercher
                    <i class="fa fa-search"></i>
                </button>             
            </form>
        </div>

        <!--Btn Ajout Entreprise + span pour animation-->
        <button class="add" onclick="window.location='{{ route('entreprise.create') }}'">Ajouter une entreprise
            <span class="first"></span>
            <span class="second"></span>
            <span class="third"></span>
            <span class="fourth"></span>
        </button>

        @if ($entreprises->isEmpty())
            <p>Aucune entreprise trouvée.</p>
        @else

        <div class="card-container">
            @foreach ($entreprises as $entreprise)
            <div class="card">
                <h2 class="card-title ">{{ $entreprise->name }}</h2>

                @if (Auth::user()->is_admin)
                <div class="crud">

                    <!-- Ajout d'un bouton suppr pour chaque entreprises -->
                <form method="POST" action="{{ route('entreprise.destroy', ['id' => $entreprise->id]) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer {{ $entreprise->name }} ?')">
                    <!-- CSRF token -->
                    @csrf
                    @method("DELETE")
                    <button class="btn" type="submit">
                        <i class="fa fa-trash" id="del"></i>
                    </button>
                </form>


                    <!--Edition Entreprise-->                
                <form method="" action="{{ route('entreprise.edit', $entreprise->id) }}" >
                    <!-- CSRF token -->
                    @csrf                                     
                    <button class="btn" type="submit">
                        <i class="fa fa-edit" id="edit"></i>
                    </button>
                </form>
                </div>
                @endif

                <div class="div">
                <img src="{{ asset('storage/'.$entreprise->logo) }}" alt="Logo">      
                  </div>
            <div>
                <div>
                    <!-- Affichage des informations de gestion d'identité -->
                    <h3 class="m-bottom card-title cursor" onclick="showId(this)">Gestion d'identité 
                        <i class="fa fa-chevron-down"></i>
                    </h3> 
                    <div class="idDetail" style="display: none">
                        <p class="padd">
                        @if ($entreprise->gestionIdentite->type === 'Autres')
                            Autre type de gestion
                        @else
                            {{ $entreprise->gestionIdentite->type }}
                        @endif
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="m-bottom card-title cursor" onclick="showParc(this)">Gestion de Parc 
                        <i class="fa fa-chevron-down"></i>
                    </h3> 
                    <div class="parcDetail" style="display: none">
                        <p class="padd">
                    @if ($entreprise->gestionParc->type ==='Autres')
                        Autre type de gestion de parc
                    @else
                        {{ $entreprise->gestionParc->type }}
                    @endif
                        </p>
                    </div>
                </div> 
                <div>
                    <h3 class="m-bottom card-title cursor" onclick="showCollab(this)">Collaboratif 
                        <i class="fa fa-chevron-down"></i>
                    </h3> 
                    <div class="collabDetail" style="display: none">
                        <p class="padd">
                        @if ($entreprise->collaboratif)
                        @if ($entreprise->collaboratif->type === 'Autres')
                            Autre type de management collaboratif
                        @else
                            {{ $entreprise->collaboratif->type }}
                        @endif
                        </p>
                    @endif
                    </div>
                        
                </div>        
                <div>
                    <h3 class="m-bottom card-title cursor" onclick="showStockage(this)">Stockage 
                        <i class="fa fa-chevron-down"></i>
                    </h3> 
                    <div class="stockDetail" style="display: none">
                        <p class="padd">
                        @if ($entreprise->stockage)
    @if ($entreprise->stockage->type === 'Autres')
        Autre type de stockage
    @else
        {{ $entreprise->stockage->type }}
    @endif
@endif
                        </p>
                    </div>    
</div>

                </div>    
                    
                
            </div>
        @endforeach
        
        </div>
        @endif
    </div>
    

    <footer>
        <p class="copyright">VaultApp by David Ltd®</p>
    </footer>

    <div id="scroll-to-top">
        <a href="#top"><img src="\img\arrow-up-solid.svg" alt="Flèche vers le haut"></a>
    </div>
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
