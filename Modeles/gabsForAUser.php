<?php
	
	require_once('Classes/ListePosts.class.php');
	require_once('/Blocs/toutesPagesApi.php');

	$listePosts= new ListePosts();


	
	if (isset($_GET['idUser']))
		{
			$listePosts->getListeByIdUser($_GET['idUser'], $bdd);
		}
	else if (isset($_GET['userName'])) 
		{
			$user= new Users();
			$user->setIdWithUserName($_GET['userName'], $bdd);
			$listePosts->getListeByIdUser($user->getId(), $bdd);
		}

	//var_dump($listePosts->getListePosts());

	$arrayToJson=$listePosts->toArray();

?>