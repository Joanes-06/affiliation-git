<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>Vérification du code</title>
</head>
<body>
    <div class="container">
        <h3>Vérification du code</h3>
        <p>Veuillez entrer le code de vérification envoyé à votre e-mail.</p>

        <form method="POST" action="{{ route('password.verify.code') }}">
            <input type="hidden" name="code" value="{{ session('code') }}">
            @csrf

            <div>
                <label for="code">Code de vérification</label>
                <input id="code" type="text" name="code" required>
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Vérifier le code</button>
            </div>
        </form>
    </div>
</body>
</html>
