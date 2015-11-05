<?php
	require_once('Classes/ListePosts.class.php');
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				if(isset($_POST['idGab']))
				{
					echo "test";
					$gab=new Posts();
					$gab->setId($_POST['idGab']);
					$gab->hydrateFromBDD($bdd);
					$gab->deleteGab($user->getId(), $bdd);
				}

			}
		else
			{
				header("Location: index.php");
			}

?>