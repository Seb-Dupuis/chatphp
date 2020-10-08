<?php
// Effectuer ici la requête qui insère le message
// Puis rediriger vers minichat.php comme ceci :
$pseudo = setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true); // On écrit un cookie


if(isset($_POST['pseudo']) AND isset($_POST['message']))
{ 
    $pseudo = $_POST['pseudo'] ;
    $message = $_POST['message'] ;
    
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'password');
    }

    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }


    $req = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(:pseudo, :message)');




    $req->execute(array(
        'pseudo' => $pseudo,
        'message' => $message
        ));

} 

header('Location: minichat.php');
