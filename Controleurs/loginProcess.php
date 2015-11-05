<?php
	
	session_start();
	include('Modeles/blocs/connexionBDD.php');
	include('Modeles/Classes/Users.class.php');

	$user= new Users();
	$user->hydrateConexion($_POST['identifiant'], $_POST['password']);
	$reussite=$user->conexion($bdd);
	if ($reussite==1)
		{
			header('location: index.php?page=home');
		}
	else 
		{
			header('location: index.php?page=Accueil');
		}


?>