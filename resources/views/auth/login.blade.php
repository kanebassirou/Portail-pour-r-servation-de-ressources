<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <meta name="description" content="Portail de réservation de ressources pour l'Université Iba Der Thiam UFR SET, Thiès, Senegal.">
    <meta name="keywords" content="réservation, ressources, université, Thiès, Sénégal, UFR SET">
    <meta name="author" content="Bassirou Kane">
    <meta property="og:title" content="Portail de réservation de ressources - Université Iba Der Thiam UFR SET">
    <meta property="og:description" content="Réservez des ressources facilement à l'Université Iba Der Thiam UFR SET, Thiès, Sénégal.">
    <meta property="og:image" content="{{ asset('assets/img/logoSET.jpeg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portail de réservation de ressources - Université Iba Der Thiam UFR SET">
    <meta name="twitter:description" content="Réservez des ressources facilement à l'Université Iba Der Thiam UFR SET, Thiès, Sénégal.">
    <meta name="twitter:image" content="{{ asset('assets/img/logoSET.jpeg') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styleLogin.css') }}">
    <title>RRSET - Portail de réservation de ressources</title>
    <link rel="icon" href="{{ asset('assets/img/logoSET.jpeg') }}" type="image/jpeg">
</head>

<body>


    <div class="container" id="container">
        <div class="form-container sign-up">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="social-icons">
                 <h4>Créer un compte</h4>
                    <!-- Exemple de lien pour l'authentification Google, nécessite Laravel Socialite -->
                    {{-- <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a> --}}
                    {{-- <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a> --}}
                </div>
                {{-- <span>ou utilisez votre adresse e-mail pour vous inscrire</span> --}}
                <div>
                    <label for="statusUser">Vous êtes :</label>
                    <select name="statusUser" id="statusUser" required>
            <option value="">Sélectionnez votre rôle</option>
            <option value="PATS">Personnel Administratif, Technique et de Service (PATS)</option>


            <option value="PER">Personnel Enseignant et de Recherche (PER)</option>
            <option value="Etudiant">Étudiant</option>
        </select>
                </div>
                <input type="text" name="name" placeholder="Nom complet" required>
                <input type="email" name="email" placeholder="Email" required>
                @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password" placeholder="Mot de passe" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
        </div>

        <div class="form-container sign-in">
            <form method="POST" action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                @csrf
                <h1>Connexion</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>ou utilisez votre adresse e-mail et mot de passe</span>

                <!-- Champ email avec gestion d'erreur -->
                <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password" placeholder="Mot de passe" required>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                <button type="submit">Se Connecter</button>




            </form>

        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="{{ asset('../assets/img/logoSET.jpeg') }}" alt="Logo"
                        style="width: 100px; height: auto;">
                    <h1>Portail de réservation</h1>
                    <p>Entrez vos détails personnels pour profiter pleinement des fonctionnalités du site.</p>
                    <button class="hidden" id="login">Se Connecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="{{ asset('../assets/img/logoSET.jpeg') }}" alt="Logo"
                        style="width: 100px; height: auto;">

                    <h1>Portail de réservation</h1>

                    <p>Inscrivez-vous avec vos informations personnelles pour utiliser toutes les fonctionnalités du
                        site.</p>
                    <button class="hidden" id="register">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
