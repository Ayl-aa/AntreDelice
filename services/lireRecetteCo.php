
<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$pseudo = $_SESSION["login"] ;


try{
  
    $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

    die('Erreur : ' . $e->getMessage());
}



$cherchIdPseudo = $db->prepare('SELECT userId  FROM userT WHERE userpseudo =:pseudo');
$cherchIdPseudo ->execute ([

  'pseudo' => $pseudo,
  
  ]);
foreach($cherchIdPseudo as $i )
{
  $pseudoId  = $i['userId'];
}

$recette = $db->query('SELECT COUNT(recetteId) AS nbrecette  , TIME_FORMAT(recetteDuree, "%H:%i") , recetteNom , pourCombien , difficulteNom , userPseudo FROM recette INNER JOIN difficulte ON recette.difficulteId = difficulte.difficulteId INNER JOIN userT ON recette.userId = userT.userId WHERE recette.userId =:pseudoId');
$cherchIdPseudo ->execute ([

  'pseudoId' => $pseudoId,
  
  ]);

foreach($recette as $i )
{

  $nomRecette = ($i['recetteNom']);
  $dureeRecette = ($i['TIME_FORMAT(recetteDuree, "%H:%i")']);
  $cbRecette = ($i['pourCombien']);
  $difficulteRecette = ($i['difficulteNom']);
  $auteur = ($i['userPseudo']);
  $nbRecette = ($i['nbrecette']);
}

$_SESSION["nbRec"] = $nbRecette;



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuisine</title>
</head>
<body>



<div id="blocCard"  >
    <div class="card">
      <div class="card-header">
     
      </div>
      <div class="card-body">
        <span class="tag tag-purple"><a class="autreLien" href="#">VOIR</a></span>
        <h4>
        <?php echo $nomRecette?>
        </h4>
        <p>
        <?php echo $dureeRecette?>
        <br>
        Pour : <?php echo $cbRecette?> personnes.
        <br>
        Niveau : <?php echo $difficulteRecette?>
        </p>
        
        <div class="user">
          <img src="https://lh3.googleusercontent.com/ogw/ADGmqu8sn9zF15pW59JIYiLgx3PQ3EyZLFp5Zqao906l=s32-c-mo" alt="user" />
          <div class="user-info">
            <h5><?php echo $auteur?></h5>
            <small>J'adore la cuisine</small>
          </div>
        </div>
      </div>
    </div>
  </div>

 

</body>
</html>





