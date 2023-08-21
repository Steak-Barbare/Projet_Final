<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Entreprise</title>
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

    <h1 class="editname">Ajouter une nouvelle Entreprise :</h1>
    <form action="{{ route('entreprise.store') }}" method="POST" enctype="multipart/form-data" class="formedit">
        @csrf

        <div>
            <label for="name">Nom de l'entreprise :</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="logo">Logo de l'entreprise :</label>
            <input type="file" id="logo" name="logo" accept="image/*" required>
        </div>

        <div>
            <label for="gestion_identite">Gestion d'identité :</label>
            <select id="gestion_identite" name="gestion_identite" required>
                <option value="M365">M365</option>
                <option value="Google Workspace">Google Workspace</option>
                <option value="Microsoft Exchange">Microsoft Exchange</option>
                <option value="Autres">Autres</option>
            </select>
        </div>

        <div>
            <label for="gestion_parc">Gestion Parc :</label>
            <select id="gestion_parc" name="gestion_parc" required>
                <option value="MEM">MEM</option>
                <option value="AirWatch">AirWatch</option>
                <option value="Azure AD">Azure AD</option>
                <option value="Sans">Sans</option>
                <option value="Autres">Autres</option>
            </select>
        </div>

        <div>
            <label for="stockage">Stockage :</label>
            <select id="stockage" name="stockage" required>
                <option value="HDD">HDD</option>
                <option value="One Drive">One Drive</option>
                <option value="Dropbox">Dropbox</option>
                <option value="Non Maîtrisé">Non Maîtrisé</option>
                <option value="Autres">Autres</option>
            </select>
        </div>

        <div>
            <label for="collaboratif">Collaboratif :</label>
            <select id="collaboratif" name="collaboratif" required>
                <option value="Teams">Teams</option>
                <option value="Google Meet">Google Meet</option>
                <option value="Slack">Slack</option>
                <option value="Autres">Autres</option>
            </select>
        </div>

        <button type="submit">Ajouter</button>
    </form>

    <footer>
        <p class="copyright">VaultApp by David Ltd®</p>
    </footer>
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