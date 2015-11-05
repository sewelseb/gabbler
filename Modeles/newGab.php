<?php
	
	require_once('Classes/Posts.class.php');
	include('Blocs/toutePageConectee.php');



	if ($conecte==1)
			{
				if(isset($_POST['gab']))
					{
						$gab= new Posts();
						$gab->newPost($user->getId(), $_POST['gab'], $bdd);
						

					}

			}
		else
			{
				header("Location: index.php");
			}

?>