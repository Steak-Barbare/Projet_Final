<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Accueil</title>
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
        
            <div>
                <section class="welcome">
                    <h1 class="padd">Bienvenue sur VaultApp, {{ Auth::user()->name }} !</h1>               
                    <p class="padd">VaultApp est l'outil complet de gestion client conçu spécialement pour les entreprises de service informatique. Simplifiez votre travail et organisez efficacement toutes les informations essentielles de vos clients en un seul endroit.</p>
                </section>
                <section class="customer">
                    <h2 class="padd">Gérez vos clients en toute simplicité</h2>
                    <p class="padd">Avec VaultApp, vous pouvez stocker et gérer toutes les informations importantes de vos clients en un seul endroit. Ne perdez plus de temps à rechercher des informations éparpillées dans des classeurs ou des feuilles de calcul.</p>
                        <a class="cta-link" href="{{ route('entreprise') }}">Commencer</a>
                </section>
                <section class="homerapport">
                    <h2 class="padd">Générez des rapports personnalisés</h2>
                    <p class="padd">Notre fonctionnalité de rapports personnalisés vous permet de visualiser des informations clés sur vos clients de manière claire et précise. Découvrez la répartition des différents types de systèmes de stockage utilisés par vos clients, leur système de gestion de parc, leur système de gestion d'identité, ainsi que leur gestion des collaborateurs ! Découvrez également les noms des clients associés à chaque type spécifique.</p>
                        <a class="cta-link" href="{{ route('rapport.index') }}">Rapports</a>
                </section>
                <section class="easy">
                    <h2 class="padd">Facilitez votre processus de travail</h2>
                    <p class="padd">VaultApp simplifie votre processus de travail en vous offrant un outil intuitif et puissant pour gérer vos clients. Gagnez du temps, augmentez votre productivité et offrez un service de qualité à vos clients.</p>
                </section>
            </div>
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
