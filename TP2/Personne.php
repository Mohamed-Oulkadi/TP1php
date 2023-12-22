<?php
class Personne {
    private $nom;
    private $prenom;
    private $dateNaissance;


    public function __construct($nom, $prenom, $dateNaissance) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function presenter() {
        echo "je m'appelle ".$this->prenom." ".$this->nom.".<br/>";
    }

    public function age(){
        $dateNaissance = new DateTime($this->dateNaissance);
        $dateAujourdhui = new DateTime();
        $age = $dateNaissance->diff($dateAujourdhui)->y;
        return $age;
        }

    public function decrirePersonne() {
        return $this -> presenter()." et j'ai ".$this->age()." ans.<br/>";
    }


}

class CertainsPersonnes extends Personne {
    private $lieuNaissance;

    public function __construct($nom, $prenom, $dateNaissance, $lieuNaissance) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->lieuNaissance = $lieuNaissance;
    }

    public function decrirePersonne() {
        return parent::decrirePersonne()." Je suis né à ".$this->lieuNaissance.".<br/>";
    }
}

class Etudiant extends Personne {
    private $cne;

    public function __construct($nom, $prenom, $dateNaissance, $cne) {
        parent::__construct($nom, $prenom, $dateNaissance);
        $this->cne = $cne;
    }

    public function boursier() {
        $age = $this->age();
        if ($age < 23 && $age > 18) {
            return "boursier";
        }
        else {
            return "non boursier";
        }
    }

    public function decrirePersonne() {
        return parent::decrirePersonne()." Je suis ".$this->boursier().".<br/>";
    }
}
?>