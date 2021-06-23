<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP-MiniChat</title>
</head>

<body>

    <form action="miniChatPost.php" method="post">

        <label for="pseudo" style="color: red; font-weight: bold;">PSEUDO: </label>
        <input type="text" id="pseudo" name="psd" placeholder="Entrer votre pseudo."><br /><br />

        <label for="message" style="color: green; font-weight: bold;">MESSAGE: </label><br>
        <textarea name="msg" id="message" cols="30" rows="10" placeholder="Entrer votre message"></textarea><br />

        <input type="submit" value="Envoyer">

    </form>

    <?php

    try {
        //Connexion à la base de donnée MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=db_minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur' . $e->getMessage());
    }

    //Préparation puis exécution de la requette
    $req = $bdd->prepare('SELECT pseudo, message FROM db_minichat.minichatdata ORDER BY ID DESC LIMIT 10');
    $req->execute();


    //Lecture des données du pseudo et du message
    while ($donnees = $req->fetch()) {
        echo "<p><strong style=\"color:blue;\">" . htmlspecialchars($donnees['pseudo'])  . "</strong>: " . htmlspecialchars($donnees['message'])  . "</p>";
    }

    $req->closeCursor();


    ?>






</body>

</html>