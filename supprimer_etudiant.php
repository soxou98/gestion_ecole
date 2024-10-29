<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Etudiant.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $etudiant = new Etudiant($db);
    $etudiant->id = $_GET['id'];

    if ($etudiant->delete()) {
        echo "Étudiant supprimé avec succès.";
    } else {
        echo "Impossible de supprimer l'étudiant.";
    }
}
?>
