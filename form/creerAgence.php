<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer agence</title>
</head>
<body>

    <form id="form" action="../post/postAgence.php" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="nom de la banque" required>

        <br>

        <label for="adresse">Adresse :</label>
        <input type="number" id="numero" name="numero" placeholder="numéro de la rue" required>
        <input type="text" id="nom-rue" name="nom-rue" placeholder="nom de la rue" required>
        <input type="text" id="ville" name="ville" placeholder="ville" required>
        <input type="number" id="code-postal" name="code-postal" placeholder="code postal" required>

        <input id="btn-envoyer" name="btn-envoyer" type="submit" value="ENVOYER">
        
    </form>
    
</body>
</html>