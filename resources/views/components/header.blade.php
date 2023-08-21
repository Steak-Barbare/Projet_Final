<div class="header">
    <img src="\img\Capturehd.jpeg" alt="logo" class="logo">           
    <nav>       
        <div class="menu-burger">
            <i class="fa fa-bars fa-3x" style="color:white"></i>
        </div>
        <ul class="hide">
            <div class="bloc">
                    <li><a href="{{ route('accueil') }}">Accueil</a></li>
                    <li><a href="{{ route('entreprise') }}">Entreprises</a></li>
                    <li><a href="{{ route('rapport.index') }}">Rapports</a></li>          
            </div>                 
            <!-- Vérifier si l'utilisateur est connecté -->
            @auth
            
            <!-- L'utilisateur est connecté, afficher le lien de déconnexion -->
            
            <li style="margin-left: auto;display:flex;" class="respnav">
                @if (Auth::user()->is_admin)
            <a class="nav-link" href="{{ route('admin.users') }}" title="Listes des utilisateurs">
                <i class="fa fa-users fa-3x"></i>
            </a>
            @endif
            <a href="{{route('profile.edit')}}" style="margin: 1rem">
                <i class="fa fa-user-circle fa-3x"></i> 
            </a>
                <form method="POST" action="{{ route('logout') }}" style="justify-content: center;
                display: flex;">
                    @csrf
                    
                <button type="submit" id="log">
                    <i class="fa fa-power-off fa-4x" id="out"></i>
                </button>
                
                </form>
            </li>
            @else
            <!-- L'utilisateur n'est pas connecté, afficher le lien de connexion -->
            <li>
                <a href="{{ route('login') }}">Connexion</a>
            </li>
            <!-- Rediriger l'utilisateur vers le formulaire de connexion -->
            @if(Route::currentRouteName() != 'login')
            <script>window.location = "{{ route('login') }}";</script>
            @endif
            @endauth
        </ul>
    </nav>
</div>
