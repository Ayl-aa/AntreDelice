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

$nom = $_POST['nom'];
$catego = $_POST['catego'];
$diffi = $_POST['difficult'];
$cb = $_POST['combien'];
$duree = $_POST['duree'];


$cherchNbEtape = $db->prepare('SELECT COUNT(numEtape) AS nbEtape FROM preparation WHERE recetteId =:idRecette ') ; 
$cherchNbEtape ->execute ([

  ':idRecette' =>$idRecetteChoisi,
  
  ]);

foreach($cherchNbEtape as $i){
  $nbEtape = ($i['nbEtape']);

}


$modifRecette = $db->prepare('UPDATE recette SET recetteNom  = :nom, recetteDuree = :duree, pourCombien= :cb, difficulteId = :diffi , categorieId = :catego WHERE recetteId = :idRecetteChoisi');
$modifRecette ->execute ([

  'nom'=> $nom,
  'duree'=>$duree,
  'cb'=> $cb,
  'diffi'=> $diffi,
  'catego' => $catego,
  'idRecetteChoisi' => $idRecetteChoisi,
  
  ]);


  $nbEtape++;
  for($i=1;$i<$nbEtape;$i++){
    if( isset($_POST[$i]) && !empty($_POST[$i]))
      {
        
        ${ 'etape' . $i }=  $_POST[$i];
      
        $modiEtapePresente = $db->query('UPDATE preparation SET descript = "'.${ 'etape' . $i }.'" WHERE numEtape = "'.$i.'" AND recetteId = "'.$idRecetteChoisi.'"');
        
  
      }
      
  }
  
  for($i=$nbEtape;$i!=30;$i++){
    if( isset($_POST[$i]) && !empty($_POST[$i]) )
    {
      
      ${ 'nouVetape' . $i }=  $_POST[$i];
    
    $ajoutEtapes = $db->query('INSERT INTO preparation(numEtape, descript , recetteId) VALUES ( "'.$i.'", "'.${ 'nouVetape' . $i }.'" , "'.$idRecetteChoisi.'" )');
    
    }
    }
  
    header("Refresh:0; url=../menuCo.php");
    $message = '<script type="text/javascript">alert("Recette modifiée ! ");</script>';
    echo $message;