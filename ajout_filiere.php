<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Filiere.php';

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();

    $filiere = new Filiere($db);
    $filiere->nom_filiere = $_POST['nom_filiere'];
    $filiere->description_filiere = $_POST['description_filiere'];
    $filiere->date_creation = $_POST['date_creation'];

    if ($filiere->create()) {
        header('Location: liste_filiere.php');
        exit;
    } else {
        echo "Erreur lors de l'ajout de la filière.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout Filière</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Ajout Filière</h2>
    <form action="ajout_filiere.php" method="post">
        <div class="form-group">
            <label for="nom_filiere">Nom de la Filière</label>
            <input type="text" class="form-control" id="nom_filiere" name="nom_filiere" required>
        </div>
        <div class="form-group">
            <label for="description_filiere">Description</label>
            <input type="text" class="form-control" id="description_filiere" name="description_filiere" required>
        </div>
        <div class="form-group">
            <label for="date_creation">Date de Création</label>
            <input type="date" class="form-control" id="date_creation" name="date_creation" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
