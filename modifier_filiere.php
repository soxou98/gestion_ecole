<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Filiere.php';

$database = new Database();
$db = $database->getConnection();

$filiere = new Filiere($db);

if ($_POST) {
    $filiere->id_filiere = $_POST['id_filiere'];
    $filiere->nom_filiere = $_POST['nom_filiere'];
    $filiere->description_filiere = $_POST['description_filiere'];
    $filiere->date_creation = $_POST['date_creation'];

    if ($filiere->update()) {
        
        header('Location: liste_filiere.php');
        //exit;
    } else {
        echo "Impossible de modifier la filière.";
    }
}

if (isset($_GET['id'])) {
    $filiere->id_filiere = $_GET['id'];
    $stmt = $filiere->readAll();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Filière</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Modifier une Filière</h2>
    <form action="modifier_filiere.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id_filiere" value="<?php echo $row['id_filiere']; ?>">
        <div class="form-group">
            <label for="nom_filiere">Nom de la Filière</label>
            <input type="text" class="form-control" id="nom_filiere" name="nom_filiere" value="<?php echo $row['nom_filiere']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description_filiere">Description</label>
            <input type="text" class="form-control" id="description_filiere" name="description_filiere" value="<?php echo $row['description_filiere']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date_creation">Date de Création</label>
            <input type="date" class="form-control" id="date_creation" name="date_creation" value="<?php echo $row['date_creation']; ?>" required>
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
