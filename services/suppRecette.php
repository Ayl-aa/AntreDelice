<?php


session_start();

$pseudo = $_SESSION["pseudo"] ;
$idRecetteChoisi = $_SESSION['recetteChoice'] ;

try{
  
  $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

  die('Erreur : ' . $e->getMessage());
}


$suppRecette= $db->prepare('DELETE FROM preparation WHERE recetteId = :idRecette');
$suppRecette ->execute([

    'idRecette'=> $idRecetteChoisi,
]);

$suppRecette= $db->prepare('DELETE FROM recette WHERE recetteId = :idRecette');
$suppRecette ->execute([

    'idRecette'=> $idRecetteChoisi,
]);


header("Refresh:0; url=../mesRecettes.php");
