<?php 

  session_start();




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cuisine</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="JS/header.js">
</head>
<body>

    <!---------------------------Header------------------------->


 <!--     faire test conecter ou non et afficher menu co           -->
 <?php 
 
 
 if (isset($_SESSION['pseudo'])){


  include('./services/enteteCo.php');
  

}
else{
   include('./services/entete.php');
  
}
?>
                
    <!---------------------------Bloc 1------------------------->
    
    <div class="s130">
      <form>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="svg-wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </div>
            <input id="search" type="text" placeholder="Que voulez vous manger?" />
          </div>
          <div class="input-field second-wrap">
            <button class="btn-search" type="button">CHERCHER</button>
          </div>
        </div>
        <span class="info">ex. Quiche, Flan, Avocat, Cookie</span>
      </form>
    </div>

    
    <!---------------------------Bloc 2-------------------------> 

<!--affichage d'une recette random -->





    
<div  class="d-flex justify-content-center ">
        <div>
        <?php include('./services/cardRecette.php');?>
        </div>
        <div>
        <?php include('./services/cardRecette.php');?>
        </div>
        <div>
        <?php include('./services/cardRecette.php');?>
        </div>
    </div>
</body>
</html>

