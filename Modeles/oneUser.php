
<?php
	
	require_once('Classes/ListUsers.class.php');
	require_once('/Blocs/toutesPagesApi.php');

	$listeUsers= new ListUsers();

	$listeUsers->getAllUsers($bdd);
	if (isset($_GET['idUser']))
		{
			$listeUsers->getListeByIdUser($_GET['idUser'], $bdd);
		}
	else if (isset($_GET['userName'])) 
		{
			$user= new Users();
			$user->setIdWithUserName($_GET['userName'], $bdd);
			$listeUsers->getListeByIdUser($user->getId(), $bdd);
		}

	//var_dump($listePosts->getListePosts());

	$arrayToJson=$listeUsers->toArray();

?>