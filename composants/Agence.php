<?php
class Agence{
    private string $nom;
    private array $adresse;
    private int $codeAgence;

    public function __construct(string $nom, array $adresse){
        $this -> codeAgence = rand(100,999);
        $this -> nom = $nom;
        $this -> adresse = $adresse;
    }

    public function getCodeAgence(){
        return $this -> codeAgence;
    }

    public function setCodeAgence(int $code){
        $this -> codeAgence = $code;
    }

    public function initCodeAgence(array $tab){  
        $newCodeAgence = rand(100,999);
        for ($i = 0; $i < count($tab) -1; $i++){
            if ($tab[0] == $newCodeAgence){
                $newCodeAgence = rand(100,999);
                $i = -1;
            }
        }
        $this -> codeAgence = $newCodeAgence;
    }
    
    public function getNom(){
        return $this -> nom;
    }

    public function setNom(string $nom){
        return $this -> nom = $nom;
    }
    
    public function getAdresse(){
        return $this -> adresse;
    }

    public function setAdresse(array $adresse){
        return $this -> adresse = $adresse;
    }

    public function showAdresse(){
        $ch = "";
        foreach($this->adresse as $elt){
            if($elt == $this->adresse["code_postal"]){
                $ch .= $elt;
            }
            else{
                $ch .= $elt . ", ";
            }
        }
        return $ch;
    }

    public function __toString(){
        return("Agence : " . $this->getCodeAgence() . ", " . $this->getNom() . ", " . $this->showAdresse());
    }

    public function toTab(){
        $tab = [];
        $tab["code_agence"] = $this-> getCodeAgence();
        $tab["nom"] = $this-> getNom();
        $tab["adresse"] = $this-> getAdresse();
        return($tab);
    }
}

?>