<?php

include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Filiere.php';

$database = new Database();
$db = $database->getConnection();

$filiere = new Filiere($db);
$stmt = $filiere->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste Filières</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Liste des Filières</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date Création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id_filiere']; ?></td>
                <td><?php echo $row['nom_filiere']; ?></td>
                <td><?php echo $row['description_filiere']; ?></td>
                <td><?php echo $row['date_creation']; ?></td>
                <td>
                    <a href="ajout_filiere.php?id=<?php echo $row['id_filiere']; ?>" class="btn btn-info">Ajouter</a>
                    <a href="modifier_filiere.php?id=<?php echo $row['id_filiere']; ?>" class="btn btn-primary ">Modifier</a>
                    <a href="supprimer_filiere.php?id=<?php echo $row['id_filiere']; ?>" class="btn btn-primary ">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
