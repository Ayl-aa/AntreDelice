<?php

session_start();


$pseudo = $_POST['pseudo'];
$_SESSION['pseudo'] =$pseudo;
$mp = $_POST['mp'];



try{
  
    $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

    die('Erreur : ' . $e->getMessage());
}



$verifPseudo = $db->prepare('SELECT userPseudo , userPass  FROM userT WHERE userpseudo = :pseudo OR userPass =:mp');
$verifPseudo ->execute ([

    ':pseudo' => $pseudo,
    ':mp' => $mp ,

    ]);
foreach($verifPseudo as $i )
{

    $userPseudo = $i["userPseudo"];
    $userPass = $i["userPass"];
}





if($pseudo != $userPseudo)
    { 
        header("Refresh:0; url=../connexion.php");
        $messagePseudo = '<script type="text/javascript">alert("Pseudo ou mot de passe incorrect");</script>';
        echo $messagePseudo;
    }
   elseif(!password_verify($mp , $userPass)){
        header("Refresh:0; url=../connexion.php");
        $messagePass = '<script type="text/javascript">alert("Pseudo ou mot de passe incorrect");</script>';
        echo $messagePass;
   }
    else
    {
     
        header('Location:../menuCo.php');
        Exit();
    }
 


    



