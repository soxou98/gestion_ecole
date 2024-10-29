<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Etudiant.php';

$database = new Database();
$db = $database->getConnection();

$etudiant = new Etudiant($db);

if ($_POST) {
    $etudiant->id = $_POST['id'];
    $etudiant->nom = $_POST['nom'];
    $etudiant->prenom = $_POST['prenom'];
    $etudiant->sexe = $_POST['sexe'];
    $etudiant->mail = $_POST['mail'];
    $etudiant->adresse = $_POST['adresse'];
    $etudiant->date_naissance = $_POST['date_naissance'];
    $etudiant->lieu_naissance = $_POST['lieu_naissance'];
    $etudiant->id_classe = $_POST['id_classe'];

    if ($etudiant->update()) {
        echo "Étudiant modifié avec succès.";
    } else {
        echo "Impossible de modifier l'étudiant.";
    }
}

if (isset($_GET['id'])) {
    $etudiant->id = $_GET['id'];
    $stmt = $etudiant->readAll();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Étudiant</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Modifier un Étudiant</h2>
    <form action="modifier_etudiant.php" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="M" <?php echo ($row['sexe'] == 'M') ? 'selected' : ''; ?>>Masculin</option>
                <option value="F" <?php echo ($row['sexe'] == 'F') ? 'selected' : ''; ?>>Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $row['mail']; ?>" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $row['adresse']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $row['date_naissance']; ?>" required>
        </div>
        <div class="form-group">
            <label for="lieu_naissance">Lieu de Naissance</label>
            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" value="<?php echo $row['lieu_naissance']; ?>" required>
        </div>
        <div class="form-group">
            <label for="id_classe">ID Classe</label>
            <input type="number" class="form-control" id="id_classe" name="id_classe" value="<?php echo $row['id_classe']; ?>" required>
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
