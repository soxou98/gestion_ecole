<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Filiere.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $filiere = new Filiere($db);
    $filiere->id_filiere = $_GET['id'];

    if ($filiere->delete()) {
        header('Location: liste_filiere.php');
        exit;
    } else {
        echo "Impossible de supprimer la filière.";
    }
}
?>
