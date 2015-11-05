<?php
	
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$user->addFollower($_GET['id'], $bdd);

				header("Location: index.php?page=Profil&userId=".$_GET['id']);
			}
		else
			{
				header("Location: index.php");
			}

?>