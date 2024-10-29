<?php
include_once 'classe/Database.php';

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO utilisateur (email, password) VALUES (:email, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Utilisateur enregistré avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 align="center">Inscription</h2>
    <form action="user.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
    <p class="mt-3">Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</div>

<script>
function validateForm() {
    
    return true;
}
</script>
</body>
</html>
