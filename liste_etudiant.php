<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Etudiant.php';

$database = new Database();
$db = $database->getConnection();

$etudiant = new Etudiant($db);
$stmt = $etudiant->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste Étudiants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Liste des Étudiants</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Date Naissance</th>
                <th>Lieu Naissance</th>
                <th>ID Classe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nom']; ?></td>
                <td><?php echo $row['prenom']; ?></td>
                <td><?php echo $row['sexe']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['adresse']; ?></td>
                <td><?php echo $row['date_naissance']; ?></td>
                <td><?php echo $row['lieu_naissance']; ?></td>
                <td><?php echo $row['id_classe']; ?></td>
                <td>
                    <a href="ajout_etudiant.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Ajouter</a>
                    

                    <a href="modifier_etudiant.php?id=<?php echo $row['id']; ?>" class="btn btn-primary ">Modifier</a>
                    <br>

                    <a href="supprimer_etudiant.php?id=<?php echo $row['id']; ?>" class="btn btn-primary " onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant?')">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
