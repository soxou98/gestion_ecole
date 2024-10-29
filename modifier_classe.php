<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Classe.php';

$database = new Database();
$db = $database->getConnection();

$classe = new Classe($db);

if ($_POST) {
    $classe->id_classe = $_POST['id_classe'];
    $classe->libelle = $_POST['libelle'];
    $classe->niveau = $_POST['niveau'];
    $classe->id_filiere = $_POST['id_filiere'];

    if ($classe->update()) {
        echo "Classe modifiée avec succès.";
    } else {
        echo "Impossible de modifier la classe.";
    }
}

if (isset($_GET['id'])) {
    $classe->id_classe = $_GET['id'];
    $stmt = $classe->readAll();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Classe</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Modifier une Classe</h2>
    <form action="modifier_classe.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id_classe" value="<?php echo $row['id_classe']; ?>">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $row['libelle']; ?>" required>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau</label>
            <input type="text" class="form-control" id="niveau" name="niveau" value="<?php echo $row['niveau']; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_filiere">ID Filière</label>
            <input type="number" class="form-control" id="id_filiere" name="id_filiere" value="<?php echo $row['id_filiere']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>

<script>
function validateForm() {
    
    return true;
}
</script>
</body>
</html>
