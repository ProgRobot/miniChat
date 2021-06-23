<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>miniChatPost</title>
</head>

<body>


    <?php
    //Effectuer la requette qui insèrts le message.


    if (isset($_POST['psd']) && isset($_POST['msg']) && strlen($_POST['psd'] > 0 && strlen($_POST['msg'] > 0))) {

        try {
            //Connexion à la base de donnée MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=db_minichat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur' . $e->getMessage());
        }
        $req = $bdd->prepare('INSERT INTO minichatdata (pseudo, message) VALUES (:pseudo,:message)');
        $req->execute(array('pseudo' => $_POST['psd'], 'message' => $_POST['msg']));
        $req->closeCursor();
    }

    //Redirection vers miniChat
    header('Location: tpMiniChat.php');

    ?>

</body>

</html>