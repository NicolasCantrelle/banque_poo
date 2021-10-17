<?php
require("../utils/constantes.php");
require("../utils/fonctions.php");
require("../composants/Compte.php");

$c;
$clients = jsonToArray(FILE_CLIENT);
foreach($clients as $cl){
    if($cl["id_client"] == $_POST["id-client"]){
        $c = $cl;
        break;
    }
}

$a;
$agences = jsonToArray(FILE_AGENCE);
foreach($agences as $ag){
    if($ag["code_agence"] == $_POST["id-agence"]){
        $a = $ag;
        break;
    }
}

$agence = new Agence($a["nom"], $a["adresse"]);
$agence->setCodeAgence($a["code_agence"]);

$client = new Client($c["nom"], $c["prenom"], $c["date_naissance"], $c["email"]);
$client->setId($c["id_client"]);

$decouvert;
if($_POST["decouvert"] == "true"){
    $decouvert = true;
}
else{
    $decouvert = false;
}

$compte = new Compte($client, $agence, $_POST["type-compte"], $decouvert, $_POST["solde"]);
$tab = $compte->toTab();

arrayToJson(FILE_COMPTE, [$tab]);

?>