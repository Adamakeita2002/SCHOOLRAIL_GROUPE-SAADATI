<!-- filepath: c:\Users\LENOVO T14\Documents\schoolrail_hetec\resources\views\student\insert.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'insertion d'étudiant</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Insérer un nouvel étudiant</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="surname">surname</label>
                <input type="text" id="surname" name="surname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nummat">Numero Matricule</label>
                <input type="text" id="nummat" name="nummat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>

</html>
