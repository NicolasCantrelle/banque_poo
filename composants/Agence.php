<?php
class Agence{
    private string $nom;
    private string $adresse;
    private ?int $codeAgence;
    public function __construct(string $nom, string $adresse, ?int $codeAgence = null){
        $this -> codeAgence = rand(100,999);
        $this -> nom = $nom;
        $this -> adresse = $adresse;
    }
    public function getCodeAgence(){
        return $this -> codeAgence;
    }
    public function setCodeAgence(array $tab){
        
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
    public function setAdresse(string $adresse){
        return $this -> adresse = $adresse;
    }
    public function __toString()
    {
        return("Agence : " . $this->getCodeAgence() . ", " . $this->getAdresse() . ", " . $this->getNom());
    }
    public function toTab(){
        return([$this-> getCodeAgence(), $this-> getAdresse(), $this-> getNom()]);
    }
}
$c = new Agence("Michelle", "dada");
echo($c);
?>