<?php

require('Agence.php');
require('Client.php');

class Compte{
    private int $numCompte;
    private Client $client;
    private Agence $agence;
    private string $typeCompte;
    private bool $decouvertAutorise;
    private float $solde;

    public function __construct(Client $client, Agence $agence, string $typeCompte, bool $decouvertAutorise, float $solde){
        $this -> numCompte = rand(10000000000, 99999999999);
        $this -> client = $client;
        $this -> agence = $agence;
        $this -> typeCompte = $typeCompte;
        $this -> decouvertAutorise = $decouvertAutorise;
        $this -> solde = $solde;
    }

    public function getClient(){
        return $this -> client;
    }

    public function setClient(Client $client){
        return $this -> client = $client;
    }

    public function getAgence(){
        return $this -> agence;
    }

    public function setAgence(Agence $agence){
        return $this -> agence = $agence;
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

    public function setDecouvertAutorise(bool $decouvertAutorise){
        return $this -> decouvertAutorise = $decouvertAutorise;
    }

    public function getNumCompte(){
        return $this -> numCompte;
    }

    public function __toString()
    {
        return("Compte : ". $this->getNumCompte() . ", " .  $this->getClient()->getId() . ", " . $this->getAgence()->getCodeAgence() . ", " . $this->getTypeCompte() . ", " . $this->getSolde() . ", " . $this->getDecouvertAutorise());
    }

    public function toTab(){
        $tab = [];
        $tab["nom_compte"] = $this->getNumCompte();
        $tab["client"] = $this->getClient()->toTab();
        $tab["agence"] = $this->getAgence()->toTab();
        $tab["type_compte"] = $this->getTypeCompte();
        $tab["deouvert_autorise"] = $this->getDecouvertAutorise();
        $tab["solde"] = $this->getSolde();
        return($tab);
    }

    
}

?>