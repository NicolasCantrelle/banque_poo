<?php
require("../utils/constantes.php");
require("../utils/fonctions.php");
require("../composants/Agence.php");

$a = [];
$a["numero"] = $_POST["numero"];
$a["nom_rue"] = $_POST["nom-rue"];
$a["ville"] = $_POST["ville"];
$a["code_postal"] = $_POST["code-postal"];

$agence = new Agence($_POST["nom"], $a);

arrayToJson(FILE_AGENCE, [$agence->toTab()]);

?>