<?php

session_start();
$pseudo = $_SESSION["pseudo"] ;

try{
  
  $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

  die('Erreur : ' . $e->getMessage());
}

$nom = $_POST['nom'];
$catego = $_POST['catego'];
$diffi = $_POST['difficult'];
$cb = $_POST['combien'];
$duree = $_POST['duree'];





$cherchIdPseudo = $db->prepare('SELECT userId  FROM userT WHERE userpseudo =:pseudo');
$cherchIdPseudo ->execute ([

  'pseudo' => $pseudo,
  
  ]);

foreach($cherchIdPseudo as $i )
{
  $pseudoId  = $i['userId'];
}

$ajoutRecette = $db->prepare('INSERT INTO recette (recetteNom, categorieId , difficulteId , pourCombien , recetteDuree , userId) VALUES (:nom, :catego, :diffi , :cb , :duree , :pseudoId)');
$ajoutRecette ->execute ([

 
  'nom'=> $nom,
  'catego' => $catego,
  'diffi'=> $diffi,
  'cb'=> $cb,
  'duree'=>$duree,
  'pseudoId' => $pseudoId,
  
  ]);




//probleme de nom qui n'est pas la seule a s'appeler comme ca

$cherchIdRecette = $db->prepare('SELECT recetteId  FROM recette WHERE recetteNom =:nom');
$cherchIdRecette ->execute ([

  'nom' => $nom,
  
  ]);
foreach($cherchIdRecette as $i )
{
  $recetteId  = $i['recetteId'];
}



for($i=0;$i!=30;$i++){
  if( isset($_POST[$i]) && !empty($_POST[$i]) )
  {
    
    ${ 'etape' . $i }=  $_POST[$i];
  
    $ajoutEtapes = $db->query('INSERT INTO preparation(numEtape, descript , recetteId) VALUES ("'.$i.'", "'.${ 'etape' . $i }.'" , "'.$recetteId.'" )');
   
  }
  }


  header("Refresh:0; url=../menuCo.php");
  $message = '<script type="text/javascript">alert("Recette envoyée ! ");</script>';
  echo $message;



