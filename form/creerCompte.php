<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/creerCompte.js"></script>
    <title>Créer compte</title>
</head>
<body onload="loadPage()">

    <form id="form" action="../post/postCompte.php" method="post">

        <select name="id-client" id="id-client" required onchange="changeClient()">
            <option value="">--Sélectionner un client--</option>
        </select>

        <select name="id-agence" id="id-agence" hidden onchange="changeAgence()">
            <option value="">--Sélectionner une agence--</option>
        </select>

        <select name="type-compte" id="type-compte" hidden onchange="changeType()">
            <option value="">--Sélectionner un type de compte--</option>
        </select>

        <select name="decouvert" id="decouvert" hidden onchange="changeDecouvert()">
            <option value="">--Découvert autorisé--</option>
            <option value="O">Oui</option>
            <option value="N">Non</option>
        </select>

        <div id="div-solde" hidden>
            <label for="solde">Solde :</label>
            <input type="number" id="solde" name="solde">
        </div>

        <input id="btn-envoyer" type="submit" value="ENVOYER">

    </form>
    
    <div id="trop-compte" hidden>
        <p>La personne a déjà 3 comptes !</p>
        <a href="../index.html">Retour à l'accueil</a>
    </div>

    <div id="aucun-client" hidden>
        <p>Il n'y a aucun client !</p>
        <a href="../index.html">Retour à l'accueil</a>
    </div>

    <div id="aucune-agence" hidden>
        <p>Il n'y a aucune agence !</p>
        <a href="../index.html">Retour à l'accueil</a>
    </div>
    
</body>
</html>