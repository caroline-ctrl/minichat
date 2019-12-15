<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Mon mini-chat</h1>
    <form action="minichat_post.php" method="post">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo"><br><br>
        <label for="message">Message</label>
        <input type="text" name="mess"><br><br>
        <hr><br>
        <input type="submit">


    </form>

    <?php
    $server = 'localhost';
    $login = 'root';
    $pass = '';

    //Verifie que la page est bien connectée a la BDD
    try {
        $connection = new PDO("mysql:host=$server;dbname=mini_chat", $login, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    //affiche les 10 premier jeux vidéo
    $reponse = $connection->query('SELECT * FROM users ORDER BY ID DESC LIMIT 0, 10');

    echo '<p>Voici les 10 premières entrées :</p>';
    while ($donnees = $reponse->fetch()) {
        echo $donnees['id'] . '. ' . '<strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['mess']) . '<br>';
    }

    $reponse->closeCursor();

    ?>

</body>

</html>