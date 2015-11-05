<?php
	
	require_once('Classes/ListePosts.class.php');
	require_once('/Blocs/toutesPagesApi.php');

	$listePosts= new ListePosts();

	$listePosts->getAllGabs($bdd);

	//var_dump($listePosts->getListePosts());

	$arrayToJson=$listePosts->toArray();

?>