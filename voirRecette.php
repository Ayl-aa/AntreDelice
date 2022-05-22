<?php

session_start();


$idRecetteChoisi = $_GET['test'];


try{
  
  $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

  die('Erreur : ' . $e->getMessage());
}

$cherchRecette = $db->query('SELECT TIME_FORMAT(recetteDuree, "%H:%i") , recetteNom , pourCombien , difficulteNom , userPseudo FROM recette INNER JOIN difficulte ON recette.difficulteId = difficulte.difficulteId INNER JOIN userT ON recette.userId = userT.userId WHERE recetteId ="'.$idRecetteChoisi.'"');

foreach($cherchRecette as $i )
{

  $nomRecette = ($i['recetteNom']);
  $dureeRecette = ($i['TIME_FORMAT(recetteDuree, "%H:%i")']);
  $cbRecette = ($i['pourCombien']);
  $difficulteRecette = ($i['difficulteNom']);
  $auteur = ($i['userPseudo']);
  
}

$cherchNbEtape = $db->query('SELECT COUNT(numEtape) AS nbEtape FROM preparation WHERE recetteId ="'.$idRecetteChoisi.'" ') ; 
foreach($cherchNbEtape as $i){
  $nbEtape = ($i['nbEtape']);

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $nomRecette?></title>
    <link rel="stylesheet" href="css/recette.css">
    
</head>
<body>
<?php include('./services/enteteCo.php');?>



<div class="cont_principal">
      <div class="cont_central">
        <div class="cont_modal cont_modal_active">
        <div class="cont_photo">
      <div class="cont_img_back">
          <img src="https://s-media-cache-ak0.pinimg.com/736x/57/98/9f/57989f2a2e186e38bf93429aa395120c.jpg" alt="" />
          </div>
      <div class="cont_mins">
          <div class="sub_mins">
        <h3><?php echo $difficulteRecette?></h3>
      <span>NIV</span>
        </div>
        <div class="cont_icon_right">
      <a href="#">  </a>
        </div>
          </div>
      <div class="cont_servings">
            <h3><?php echo $cbRecette?></h3>
      <span>PERS</span>
          </div>
      <div class="cont_detalles">
          <h3><?php echo $nomRecette?></h3>
      <p>Durée : <?php echo $dureeRecette?></p>
      <br>
      <p>De <?php echo $auteur?></p>
          </div>
          </div>
      <div class="cont_text_ingredients">
      <div class="cont_over_hidden">
       
        <div class="cont_tabs">
        <ul>
          <li><a href="#"><h4>INGREDIENTS</h4></a></li>
          <li><a href="#"><h4>PREPARATION</h4></a></li>
        </ul>  
        </div>
        
        <?php for($i=0;$i<$nbEtape;$i++){
          $b=$i +1;
         
          $cherchEtape = $db->query('SELECT descript , numEtape FROM preparation WHERE recetteId ="'.$idRecetteChoisi.'" AND numEtape ="'.$b.'" ');
          foreach($cherchEtape as $a )
            {

            $etape= ($a ['descript']);
            

            } 
        ?>

            <div class="cont_text_det_preparation">

            <div class="cont_title_preparation">
              <p>ETAPE <?php echo $i+1 ?></p>
              </div>
            <div class="cont_info_preparation">
              <p><?php echo $etape?></p>
              </div> 

            </div>

          <?php
        }
        ?>
      
        </div>
          </div>
         </div>
      </div>
    
</body>
</html>