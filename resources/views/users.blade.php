<!DOCTYPE html>
<html>
<head>
    <title>Listes des utilisateurs</title>
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
    @if (Auth::user()->is_admin)
    <x-header/>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h1 class="padd">Liste des utilisateurs enregistrés :</h1>
    <table class="useresp">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!$user->access)
                            <a href="{{ route('admin.users.delete', ['user' => $user->id]) }}" class="useresp"><i class="fa fa-trash fa-3x" title="Supprimer" style="color: red"></i></a>
                            <a href="{{ route('admin.users.approve', ['user' => $user->id]) }}" class="useresp" title="Approuver l'accès"  onclick="return confirmAccess('{{ $user->name }}')" >
                            <i class="fa fa-check fa-3x" style="color:
                            green"></i>
                            </a>
        @if (!$user->is_admin)
            <a href="{{ route('admin.users.make-admin', ['user' => $user->id]) }}" class="useresp"><i class="fa fa-star fa-3x" title="Autoriser en tant qu'administrateur" style="color: gold"></i></a>
        @endif
    @else
    <a href="{{ route('admin.users.delete', ['user' => $user->id]) }}" class="useresp" title="Supprimer"  onclick="return confirmDelete('{{ $user->name }}')">
        <i class="fa fa-trash fa-3x" style="color: red"></i>
    </a>
    @if (!$user->is_admin)
        <a href="{{ route('admin.users.make-admin', ['user' => $user->id]) }}" class="useresp" title="Autoriser en tant qu'administrateur"  onclick="return confirmAuthorize('{{ $user->name }}')">
            <i class="fa fa-star fa-3x" style="color: gold"></i>
        </a>
    @endif
    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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