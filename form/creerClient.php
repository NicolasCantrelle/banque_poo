<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer client</title>
</head>
<body>

    <form id="form" action="../post/postClient.php" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" placeholder="nom" required>

        <br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>

        <br>

        <label for="date">Date de naissance :</label>
        <input type="date" id="date" name="date" required>

        <br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="email" required>

        <br>

        <input id="btn-envoyer" type="submit" value="ENVOYER">
        
    </form>
    
</body>
</html>