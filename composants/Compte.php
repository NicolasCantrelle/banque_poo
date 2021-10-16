<?php
class Compte{
    private string $idClient;
    private int $codeAgence;
    private string $typeCompte;
    private float $solde;
    private string $decouvertAutorise;
    private int $numCompte;

    public function __construct(string $idClient, int $codeAgence, string $typeCompte, float $solde, string $decouvertAutorise, int $numCompte){
        $this -> numCompte = $numCompte;
        $this -> idClient = $idClient;
        $this -> codeAgence = $codeAgence;
        $this -> typeCompte = $typeCompte;
        $this -> solde = $solde;
        $this -> decouvertAutorise = $decouvertAutorise;
    }

    public function getIdClient(){
        return $this -> idClient;
    }

    public function setIdClient(string $idClient){
        return $this -> idClient = $idClient;
    }

    public function getCodeAgence(){
        return $this -> codeAgence;
    }

    public function setCodeAgence(int $codeAgence){
        return $this -> codeAgence = $codeAgence;
    }
    
    public function getTypeCompte(){
        return $this -> typeCompte;
    }

    public function setTypeCompte(string $typeCompte){
        return $this -> typeCompte = $typeCompte;
    }

    public function getSolde(){
        return $this -> solde;
    }

    public function setSolde(float $solde){
        return $this -> solde = $solde;
    }

    public function getDecouvertAutorise(){
        return $this -> decouvertAutorise;
    }

    public function setDecouvertAutorise(string $decouvertAutorise){
        return $this -> decouvertAutorise = $decouvertAutorise;
    }

    public function getNumCompte(){
        return $this -> numCompte;
    }

    public function __toString()
    {
        return("Compte : ". $this->getNumCompte() . ", " .  $this->getIdClient() . ", " . $this->getCodeAgence() . ", " . $this->getTypeCompte() . ", " . $this->getSolde() . ", " . $this->getDecouvertAutorise());
    }

    public function toTab(){
        return([$this-> getNumCompte(), $this-> getIdClient(), $this-> getCodeAgence(), $this-> getTypeCompte(), $this-> getSolde(), $this-> getDecouvertAutorise()]);
    }
}

// fonction qui crée le numéro de compte

function setNumCompte(array $tab){

    $newNumCompte = rand(10000000000,99999999999);
    for ($i = 0; $i < count($tab) ; $i++){
        if ($tab[$i]["id_compte"] == $newNumCompte){
            $newNumCompte = rand(10000000000,99999999999);
            $i = -1;
        }
    }
    return $newNumCompte;
}

// main

require 'utils\constantes.php';
require 'utils\fonctions.php';

$tab=jsonToArray(FILE_COMPTE);

$c = new Compte ("FA121212", "123", "Livret A", "574", "Oui",setNumCompte($tab));
echo($c);

?>