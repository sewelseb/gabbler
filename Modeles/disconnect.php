<?php
	session_start();
	include '/Modeles/Blocs/connexionBDD.php';
	include '/Modeles/Classes/objAdmin.php';

	$_SESSION['clef']="";
	//setcookie("id", "", time()+3600);
	$_SESSION['id'] = "";
	$_SESSION['userName'] = "";

	header("Location: index.php");
	

?>