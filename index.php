<?php
include 'authentifi.php'; 
?>


<!DOCTYPE html>
<html>
<head>
    <title>Gestion de l'Institut</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="mt-5" align="center">Gestion de l'Institut</h2>
    <div class="list-group mt-4">
        <a href="liste_filiere.php" class="list-group-item list-group-item-action">Liste des Filières</a>
        <a href="liste_classe.php" class="list-group-item list-group-item-action">Liste des Classes</a>
        <a href="liste_etudiant.php" class="list-group-item list-group-item-action">Liste des Étudiants</a>
    </div>
    <a href="logout.php" class="btn btn-danger mt-4">Déconnexion</a>
</div>
</body>
</html>

