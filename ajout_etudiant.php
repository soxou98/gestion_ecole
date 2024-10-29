<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Etudiant.php';
include_once dirname(__FILE__) . '/classe/Classe.php';

$database = new Database();
$db = $database->getConnection();

if ($_POST) {
    $etudiant = new Etudiant($db);
    $etudiant->nom = $_POST['nom'];
    $etudiant->prenom = $_POST['prenom'];
    $etudiant->sexe = $_POST['sexe'];
    $etudiant->mail = $_POST['mail'];
    $etudiant->adresse = $_POST['adresse'];
    $etudiant->date_naissance = $_POST['date_naissance'];
    $etudiant->lieu_naissance = $_POST['lieu_naissance'];
    $etudiant->id_classe = $_POST['id_classe'];

    if ($etudiant->create()) {
        echo "Étudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'étudiant.";
    }
}

$classe = new Classe($db);
$classes = $classe->readAll();
?>

<!DOCTYPE html>
<html>
head>
    <title>Ajout Étudiant</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Ajout des Étudiants</h2>
    <form action="ajout_etudiant.php" method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select class="form-control" id="sexe" name="sexe" required>
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" class="form-control" id="mail" name="mail" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
        </div>
        <div class="form-group">
            <label for="lieu_naissance">Lieu de Naissance</label>
            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" required>
        </div>
        <div class="form-group">
            <label for="id_classe">Classe</label>
            <select class="form-control" id="id_classe" name="id_classe" required>
                <?php while ($row = $classes->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row['id_classe']; ?>"><?php echo $row['libelle']; ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</body>
</html>
