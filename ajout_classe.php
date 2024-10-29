<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Classe.php';
include_once dirname(__FILE__) . '/classe/Filiere.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $classe = new Classe($db);
    $classe->libelle = $_POST['libelle'];
    $classe->niveau = $_POST['niveau'];
    $classe->id_filiere = $_POST['id_filiere'];

    if ($classe->create()) {
        echo "Classe ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la classe.";
    }
}

$filiere = new Filiere($db);
$filieres = $filiere->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout Classe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Ajouter une Classe</h2>
    <form action="ajout_classe.php" method="post">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" required>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau</label>
            <input type="text" class="form-control" id="niveau" name="niveau" required>
        </div>
        <div class="form-group">
            <label for="id_filiere">Filière</label>
            <select class="form-control" id="id_filiere" name="id_filiere" required>
                <?php while ($row = $filieres->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['id_filiere']; ?>"><?php echo $row['nom_filiere']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
