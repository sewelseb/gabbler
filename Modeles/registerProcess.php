<?php
	include 'Modeles/Blocs/connexionBDD.php';
	include 'Modeles/Classes/Users.class.php';
	session_start();

	$user = new Users();
	//var_dump($_POST);
	$reussite=$user->hydrateInscription($_POST["identifiant"], $_POST["password"], $_POST["passwordVerif"], $_POST["mail"], $bdd);//hydrate l'objet et vérifie si les mdp correspondent
	echo "test";
	var_dump($bdd);
	if($reussite==1)
	{
		header("Location: index.php?page=Accueil&message=mauvaisNonCoherent");
	}
	elseif($reussite==2) 
	{
		header("Location: index.php?page=Accueil&message=pseudoDejaPrix");
	}
	else //cas ou on peut s'inscrire
	{
		$user->inscription($bdd);

		$user= new Users();
		$user->hydrateConexion($_POST["identifiant"], $_POST["password"]);
		var_dump($_POST);
		$reussiteCo=$user->conexion($bdd);
		
				//echo 'test3';
				//var_dump($_SESSION);
				header('location: index.php?page=home');
				
			
	}

	
?>