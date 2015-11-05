
<?php
	
	require_once('Classes/ListUsers.class.php');
	require_once('/Blocs/toutesPagesApi.php');

	$listeUsers= new ListUsers();

	$listeUsers->getAllUsers($bdd);

	//var_dump($listePosts->getListePosts());

	$arrayToJson=$listeUsers->toArray();

?>