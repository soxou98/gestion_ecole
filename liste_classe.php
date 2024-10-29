<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Classe.php';

$database = new Database();
$db = $database->getConnection();

$classe = new Classe($db);
$stmt = $classe->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste Classes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Liste des Classes</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libellé</th>
                <th>Niveau</th>
                <th>ID Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id_classe']; ?></td>
                <td><?php echo $row['libelle']; ?></td>
                <td><?php echo $row['niveau']; ?></td>
                <td><?php echo $row['id_filiere']; ?></td>
                <td>
                    <a href="ajout_classe.php?id=<?php echo $row['id_classe']; ?>" class="btn btn-info">Ajouter</a>

                    <a href="modifier_classe.php?id=<?php echo $row['id_classe']; ?>" class="btn btn-primary ">Modifier</a>

                    <a href="sup_classe.php?id=<?php echo $row['id_classe']; ?>" class="btn btn-primary " onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe?')">Supprimer</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
