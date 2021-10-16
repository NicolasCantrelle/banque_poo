<?php
class Client{
    private string $id;
    private string $nom;
    private string $prenom;
    private string $dateNaissance;
    private string $mail;

    public function __construct(string $nom, string $prenom, string $dateNaissance, string $mail){
        $this -> id = rand(10000000000, 99999999999);
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> dateNaissance = $dateNaissance;
        $this -> mail = $mail;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNom(){
        return $this -> nom;
    }

    public function setNom(string $nom){
        return $this -> nom = $nom;
    }

    public function getPrenom(){
        return $this -> prenom;
    }

    public function setPrenom(string $prenom){
        return $this -> prenom = $prenom;
    }

    public function getDateNaissance(){
        return $this -> dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance){
        return $this -> dateNaissance = $dateNaissance;
    }

    public function getMail(){
        return $this -> mail;
    }

    public function setMail(string $mail){
        return $this -> mail = $mail;
    }

    public function __toString(){
        return("Client : " . $this->getNom() . ", " . $this->getPrenom(). ", " . $this->getDateNaissance(). ", " . $this->getMail());
    }
    
    public function toTab(){
        $tab = [];
        $tab["id_agence"] = $this-> getId();
        $tab["nom"] = $this-> getNom();
        $tab["prenom"] = $this-> getPrenom();
        $tab["date_naissance"] = $this-> getDateNaissance();
        $tab["email"] = $this-> getMail();
        return($tab);
    }
}

?>