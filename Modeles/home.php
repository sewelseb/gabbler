<?php
	require_once('Classes/ListePosts.class.php');
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$listePosts = new ListePosts();
				//TODO: rechercher les postes des amis
				$user->setPeapleIFollowFromBDD($bdd);
				//var_dump($user->getUsersIFollow());
				$listePosts->getPostsDesAmis($user->getUsersIFollow(),$bdd);

			}
		else
			{
				header("Location: index.php");
			}

?>