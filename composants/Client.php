<?php
class Client{
    private string $genre;
    private string $nom;
    private string $prenom;
    private int $age;
    private string $mail;
    public function __construct(string $genre, string $nom, string $prenom, int $age, string $mail){
        $this -> genre = $genre;
        $this -> nom = $nom;
        $this -> prenom = $prenom;
        $this -> age = $age;
        $this -> mail = $mail;
    }

    public function getGenre(){
        return $this -> genre;
    }
    public function setGenre(string $genre){
        return $this -> genre = $genre;
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

public function getAge(){
    return $this -> age;
}
public function setAge(int $age){
    return $this -> age = $age;
}

public function getMail(){
    return $this -> mail;
}
public function setMail(string $mail){
    return $this -> mail = $mail;
}

public function __toString()
{
    return("Client : " . $this->getGenre() . ", " . $this->getNom() . ", " . $this->getPrenom(). ", " . $this->getAge(). ", " . $this->getMail());
}
public function toTab(){
    return([$this-> getGenre(), $this-> getNom(), $this-> getPrenom(), $this-> getAge(), $this-> getMail()]);
}
}
$c = new Client("Femme", "Michelle", "Claude", "48", "michellelesang@gmail.com");
echo($c);
?>