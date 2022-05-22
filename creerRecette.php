<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuisine</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/creerRecette.css">
    <script type="text/javascript">
      
      var i2 = 1;

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

      <form action="./services/envoiRecette.php" method="POST">

        <h1>Rédige ta recette !</h1>

       

          <div class="plusieur-item">
            <input type="text" id="nom" name="nom" placeholder="Gauffre" />
            <select id="catego" name="catego">
              <option value="1">Entree</option>
              <option value="2">Plat</option>
              <option value="3">Dessert</option>
            </select>
          </div>
          <br>
        
          <div class="item">
            <select  id="difficult" name="difficult">
            <option value="1">Niveau 1</option>
            <option  value="2">Niveau 2</option>
            <option  value="3">Niveau 3</option>
            </select>
          </div>
        
      
        <div class="plusieur-item">
      
          <input type="number" name="combien" id="combien" placeholder="Pour combien ?" />
          <input type="time" name="duree" id="duree" required/>
        </div>

        <div class="item">
          <p>Etape 1</p>
          <textarea id="etape1" name="1" rows="5"></textarea>
        </div>
        
        <span id="etape_1"></span>
        
        <div class="btn-block">
          
        <a  href="javascript:create_champ(1)">Ajouter une etape</a>
       
          <button type="submit" >Publier</button>
        </div>

      </form>

    </div>
    </div>

    
</body>
</html>