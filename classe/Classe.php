<?php
class Classe {
    private $conn;
    private $table_name = "classe";

    public $id_classe;
    public $libelle;
    public $niveau;
    public $id_filiere;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (libelle, niveau, id_filiere) VALUES (:libelle, :niveau, :id_filiere)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':libelle', $this->libelle);
        $stmt->bindParam(':niveau', $this->niveau);
        $stmt->bindParam(':id_filiere', $this->id_filiere);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET libelle=:libelle, niveau=:niveau, id_filiere=:id_filiere WHERE id_classe=:id_classe";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":libelle", $this->libelle);
        $stmt->bindParam(":niveau", $this->niveau);
        $stmt->bindParam(":id_filiere", $this->id_filiere);
        $stmt->bindParam(":id_classe", $this->id_classe);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_classe=:id_classe";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_classe", $this->id_classe);

        return $stmt->execute();
    }
}
?>
