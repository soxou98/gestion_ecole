<?php
class Filiere {
    private $conn;
    private $table_name = "filiere";

    public $id_filiere;
    public $nom_filiere;
    public $description_filiere;
    public $date_creation;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        
        $query = "INSERT INTO " . $this->table_name . " (nom_filiere, description_filiere, date_creation) VALUES (:nom_filiere, :description_filiere, :date_creation)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nom_filiere", $this->nom_filiere);
        $stmt->bindParam(":description_filiere", $this->description_filiere);
        $stmt->bindParam(":date_creation", $this->date_creation);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom_filiere=:nom_filiere, description_filiere=:description_filiere, date_creation=:date_creation WHERE id_filiere=:id_filiere";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nom_filiere", $this->nom_filiere);
        $stmt->bindParam(":description_filiere", $this->description_filiere);
        $stmt->bindParam(":date_creation", $this->date_creation);
        $stmt->bindParam(":id_filiere", $this->id_filiere);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_filiere=:id_filiere";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id_filiere", $this->id_filiere);

        return $stmt->execute();
    }
}
?>
