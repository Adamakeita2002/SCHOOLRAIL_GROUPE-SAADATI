<!-- filepath: c:\Users\LENOVO T14\Documents\schoolrail_hetec\resources\views\student\insert.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'insertion d'étudiant</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>

<body>
    <div class="container">
        <h1>Insérer un nouvel enseignant</h1>
        <form action="<?php echo e(route('managerstore')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
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
<?php /**PATH C:\Users\LENOVO T14\Documents\SCHOOLRAIL_HETEC\resources\views/manager/insert.blade.php ENDPATH**/ ?>