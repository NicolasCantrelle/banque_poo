<?php

require("../utils/constantes.php");
require("../utils/fonctions.php");
require("../composants/Compte.php");

$client = new Client($_POST["nom"], $_POST["prenom"], $_POST["date"], $_POST["email"]);

arrayToJson(FILE_CLIENT, [$client->toTab()]);

?>