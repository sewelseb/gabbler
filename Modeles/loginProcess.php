<?php
	session_start();
	include '/Modeles/Blocs/connexionBDD.php';
	include '/Modeles/Classes/objAdmin.php';

	$user= new Users();
	$user->hydrateConexion($_POST['userName'], $_POST['password']);
	$reussite=$user->conexion($bdd);
	if ($reussite==1)
		{
			header('location: /Home');
		}
	else 
		{
			header('location: /Accueil');
		}

?>