<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <div class="container">
        <h3>Réinitialisation du mot de passe</h3>
        <p>Veuillez entrer votre nouveau mot de passe.</p>

        <form method="POST" action="{{ route('password.reset') }}">
            <input type="hidden" name="code" value="{{ session('code') }}">
            @csrf

            <div>
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ session('email') }}" readonly>
                <label for="password">Nouveau mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit">Réinitialiser le mot de passe</button>
            </div>
        </form>
    </div>
</body>
</html>
