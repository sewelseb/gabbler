<?php
	
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$userProfile = new Users();
				if(isset($_GET['userName']))
				{
					$userProfile->setIdWithUserName($_GET['userName'], $bdd);
					$userProfile->hydrateTotalWithId($bdd);
				}
				else if(isset($_GET['userId']))
				{
					$userProfile->setId($_GET['userId']);
					$userProfile->hydrateTotalWithId($bdd);
				}
				else
				{
					header("Location: index.php?page=myProfile.php");
				}
				$userProfile->amIFollowing($user->getId(), $bdd);



			}
		else
			{
				header("Location: index.php");
			}

?>