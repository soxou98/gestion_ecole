<?php
include_once dirname(__FILE__) . '/classe/Database.php';
include_once dirname(__FILE__) . '/classe/Classe.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();

    $classe = new Classe($db);
    $classe->id_classe = $_GET['id'];

    if ($classe->delete()) {
        echo "Classe supprimée";
    } else {
        echo "Impossible de supprimer la classe.";
    }
}
?>
