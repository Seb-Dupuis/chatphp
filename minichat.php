<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Livre d'Or'</h1>

    <h3>C'est le moment de vous faire enttendre !</h3>



    <div class="formulaire">
        <form method="POST" action="minichat_post.php " class="col-lg-6 offset-lg-3 ">
        <div class="row justify-content-center">

                <label for="pseudo" class="">Votre pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" />

<br>
<br>
                    
                <label for="message" class="">Votre message</label>
                    <textarea name="message" id="message" >
            </textarea>
                    <button type="submit" class="btn btn-primary">Valider</button> </p>
                </div>
        </form>
    </div>

    <?php

    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } 
    catch (Exception $e) 
    {
        die('Erreur : ' . $e->getMessage());
    }

    $reponse = $bdd->query('SELECT pseudo, message FROM chat ORDER BY id DESC LIMIT 10');

    
    echo '<ul>';
    while ($donnees = $reponse->fetch()) 
    {
        echo '<li><strong>' . htmlspecialchars($donnees['pseudo']) . ' : </strong>' . htmlspecialchars($donnees['message']) . '</li>';
    }
    echo '</ul>';

    $reponse->closeCursor();
 
    ?>



    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>
