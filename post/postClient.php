<?php

require("../utils/constantes.php");
require("../utils/fonctions.php");
require("../composants/Compte.php");

if(isset($_POST["btn-envoyer"])){
    $client = new Client($_POST["nom"], $_POST["prenom"], $_POST["date"], $_POST["email"]);
    arrayToJson(FILE_CLIENT, [$client->toTab()]);
}
else{
    echo("<p>Veuillez remplir le formulaire correctement<p>");
    echo("<a href='../index.html'>Retour à l'accueil</a>");
}


?>