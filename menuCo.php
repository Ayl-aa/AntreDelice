<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Mon espace</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/choixConnect.css">
    
</head>
<body>

<?php include('./services/enteteCo.php');?>

<?php 
 
 
 if (!isset($_SESSION['pseudo'])){


  header("Refresh:0; url=../index.php");
  

}

?>
  <h1>Bonjour <?php  echo $_SESSION['pseudo'];  ?></h1>

   

<div id="bloc">

<div id="bloc1">

    <div class="scene">
    <a href="creerRecette.php"><div class="cube">
        <span class="side top">Recette</span>
        <span class="side front">Nouvelle</span>
      </div>
      </a>
    </div>
<a href=""></a>

</div>

<div id="bloc2">


    <div class="scene">
    <a href="mesRecettes.php"><div class="cube">
        <span class="side top">Mes recettes</span>
        <span class="side front">Voir</span>
      </div>
      </a>
    </div>
  </div>


  </div>
  


</body>
</html>