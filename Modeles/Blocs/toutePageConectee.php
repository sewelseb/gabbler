<?php	
	session_start();
	include('Modeles/Blocs/connexionBDD.php');
	include_once('Modeles/Classes/Users.class.php');
	
	
	$user=new Users();
	$conecte=$user->verificationConecte($bdd);
	if ($conecte)
	{
		$user->hydrateTotal($bdd);
	}
	
	
?>