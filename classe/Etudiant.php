<?php
class Etudiant {
    private $conn;
    private $table_name = "etudiant";

    public $id;
    public $nom;
    public $prenom;
    public $sexe;
    public $mail;
    public $adresse;
    public $date_naissance;
    public $lieu_naissance;
    public $id_classe;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create()  {
        $query = "INSERT INTO " . $this->table_name . " (nom, prenom, sexe, mail, adresse, date_naissance, lieu_naissance, id_classe) VALUES (:nom, :prenom, :sexe, :mail, :adresse, :date_naissance, :lieu_naissance, :id_classe)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":sexe", $this->sexe);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":date_naissance", $this->date_naissance);
        $stmt->bindParam(":lieu_naissance", $this->lieu_naissance);
        $stmt->bindParam(":id_classe", $this->id_classe);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nom=:nom, prenom=:prenom, sexe=:sexe, mail=:mail, adresse=:adresse, date_naissance=:date_naissance, lieu_naissance=:lieu_naissance, id_classe=:id_classe WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nom", $this->nom);
        $stmt->bindParam(":prenom", $this->prenom);
        $stmt->bindParam(":sexe", $this->sexe);
        $stmt->bindParam(":mail", $this->mail);
        $stmt->bindParam(":adresse", $this->adresse);
        $stmt->bindParam(":date_naissance", $this->date_naissance);
        $stmt->bindParam(":lieu_naissance", $this->lieu_naissance);
        $stmt->bindParam(":id_classe", $this->id_classe);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
?>
