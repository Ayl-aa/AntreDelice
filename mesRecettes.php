

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes recettes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

  
<?php include('./services/enteteCo.php');?>

<div id="cardMesRecettes">
<section>
  <h1>Mes recettes</h1>
<?php 
    include('./services/cardMesRecette.php'); 
?>
</section>
</div>
     
    
</body>
</html>