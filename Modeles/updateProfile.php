<?php
	require_once('Classes/ListePosts.class.php');
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$user->setNom($_POST['nom']);
				$user->setPrenom($_POST['prenom']);
				$user->setMail($_POST['mail']);
				$user->updateProfile($bdd);

			}
		else
			{
				header("Location: index.php");
			}

?>