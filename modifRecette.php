<?php

session_start();


$idRecetteChoisi = $_SESSION['recetteChoice'] ;


try{
  
  $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

  die('Erreur : ' . $e->getMessage());
}


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
    <title>Modifier ma recette</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/creerRecette.css">
    <script type="text/javascript">
      
      <?php
       echo "var nbEtape ='$nbEtape';";
   ?>
      
      var i2 = nbEtape;
     
      function create_champ(i) {
      i2 ++;
      
      document.getElementById('etape_'+i).innerHTML += (i <= 10) ? '<br /><p>Etape'+i2+' </p><textarea name="'+i2+'" id="etape_'+i2+'"></textarea>' : '';
      
      }
</script>
</head>
<body>
<?php include('./services/enteteCo.php');?>


<div class="elementConnect">
  <div id="testbox">

      <form action="./services/envoiModifRecette.php" method="POST">

        <h1>Modifier</h1>

       

          <div class="plusieur-item">
            <input type="text" id="nom" name="nom" placeholder="Gauffre" value="<?php echo $nomRecette ?>"/>
            <select id="catego" name="catego" >
              <option value="1">Entree</option>    //selected
              <option value="2" >Plat</option>
              <option value="3">Dessert</option>
            </select>
          </div>
          <br> 
        
          <div class="item">
            <select  id="difficult" name="difficult">
            <option value="1">Niveau 1</option>
            <option  value="2">Niveau 2</option>      //selected
            <option  value="3">Niveau 3</option>
            </select>
          </div>
        
      
        <div class="plusieur-item">
      
          <input type="text" name="combien" id="combien" placeholder="Pour combien ?" value="<?php echo $cbRecette ?>" />
          <input type="time" name="duree" id="duree" required value="<?php echo $dureeRecette ?>"/>
        </div>




        <?php for($i=0;$i<$nbEtape;$i++){
          $b=$i +1;
         
          $cherchEtape = $db->query('SELECT descript , numEtape FROM preparation WHERE recetteId ="'.$idRecetteChoisi.'" AND numEtape ="'.$b.'" ');
          foreach($cherchEtape as $a )
            {

            $etape= ($a ['descript']);
            

            } 
        ?>

        <div class="item">
          <p>Etape <?php echo $i+1 ?></p>
          <textarea id="<?php echo $i+1 ?>" name="<?php echo $i+1 ?>" rows="5"  ><?php echo $etape ?></textarea> 
        </div>

        <?php
        }
        ?>



<?php $ite = $nbEtape+1; ?>


        <span id="etape_<?php echo $ite?>"></span>
        <div class="btn-block">
        <a href="javascript:create_champ(<?php echo $ite?>)">Ajouter une etape</a>
          <button type="submit" >Publier</button>
        </div>

        

      </form>

    </div>
    </div>

    
</body>
</html>