<?php
require("../utils/constantes.php");
require("../utils/fonctions.php");
require("../composants/Agence.php");

if(isset($_POST["btn-envoyer"])){
    $a = [];
    $a["numero"] = $_POST["numero"];
    $a["nom_rue"] = $_POST["nom-rue"];
    $a["ville"] = $_POST["ville"];
    $a["code_postal"] = $_POST["code-postal"];

    $agence = new Agence($_POST["nom"], $a);

    arrayToJson(FILE_AGENCE, [$agence->toTab()]);
}
else{
    echo("<p>Veuillez remplir le formulaire correctement<p>");
    echo("<a href='../index.html'>Retour à l'accueil</a>");
}



?>