<?php
	require_once('Classes/ListUsers.class.php');
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				
				$listUsers = new ListUsers();
				$listUsers->searchFromBdd($_GET['recherche'], $bdd);
				foreach ($listUsers->getListeUsers() as $userItem) 
					{
						$userItem->amIFollowing($user->getId(), $bdd);
					}



			}
		else
			{
				header("Location: index.php");
			}

?>