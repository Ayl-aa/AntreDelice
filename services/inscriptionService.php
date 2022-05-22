

<?php

session_start();

try{
  
    $db = new PDO('mysql:host=localhost;dbname=mercier6;charset=utf8', 'mercier', 'Hdf18GK@');

}
catch(Exception $e){

    die('Erreur : ' . $e->getMessage());
}

$pseudo = $_POST['pseudo'];
$mp = $_POST['mp'];
$mpHash = password_hash($mp, PASSWORD_DEFAULT);

$mpConf = $_POST['mpConf'];

$_SESSION["pseudo"]=$pseudo;



$verifPseudo=$db->query('SELECT userPseudo FROM userT ');
foreach($verifPseudo as $i){
    $pseudoBase = $i['userPseudo'];
    
}

//probleme au niv du faite qu'il donne que le dernier pseudo
if($pseudo == $pseudoBase){
    header("Refresh:0; url=../inscription.php");
    $message = "Pseudo deja utilisé";
    echo $message;
}

else{


function check_mdp_format($mp)
{
	$majuscule = preg_match('@[A-Z]@', $mp);
	$minuscule = preg_match('@[a-z]@', $mp);
	$chiffre = preg_match('@[0-9]@', $mp);
	
	if(!$majuscule || !$minuscule || !$chiffre || strlen($mp) < 8)
	{
		return false;
	}
	else 
		return true;
}

if (empty($_POST['pseudo']) || empty($_POST['mp']) || empty($_POST['mpConf']) ) 
{
    echo "Vous n'avez pas rempli tous les champs !";
} 
elseif(check_mdp_format($mp) != false)
{

            echo "Format non correct";	
              
}

elseif ($mp !== $mpConf) 
{
    echo "Les deux mot de passe ne sont pas pareil";
} 

else 
{
    $recetteDB = $db -> prepare('INSERT INTO userT(userPass , userPseudo ) VALUES (:pass, :pseudo )');
    $recetteDB -> execute([
    'pass'=> $mpHash,
    'pseudo' => $pseudo,

]);
    header('Location:../menuCo.php');
    Exit();
}


}



