<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/formCo.css" rel="stylesheet" />
    <title>Connexion</title>
</head>


  

    <body>

    <?php include('./services/entete.php');?>

    <div class="main-block">
      <h1>Connecte-toi</h1>
      <form action="./services/connexionService.php" method="POST">
        
        <hr>
        <label id="icon" for="pseudo"><i class="fas fa-user"></i></label>
        <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required/>
        <label id="icon" for="mp"><i class="fas fa-unlock-alt"></i></label>
        <input type="password" name="mp" id="mp" placeholder="Mot de passe" required/>
        <hr>
    
        <div class="btn-block">
          <p>Vous n'avez pas de compte ?<a href="./inscription.php">Inscrivez-vous</a>.</p>
          <button class="buttonForm" type="submit" >Connexion</button>
        </div>
      </form>
      
    </body>
</html>