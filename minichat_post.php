<?php
$server = 'localhost';
$login = 'root';
$pass = '';

//Verifie que la page est bien connectée a la BDD
try{
    $connection = new PDO("mysql:host=$server;dbname=mini_chat", $login, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $connection->prepare('INSERT INTO users (pseudo, mess) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['mess']));


//Redirection de visiteur vers la page du minichat
header('location: minichat.php');


?>