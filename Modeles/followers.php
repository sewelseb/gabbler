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
				
				$userProfile->amIFollowing($userProfile->getId(), $bdd);
				//$userProfile->getAllMyFollowers($bdd);
				//var_dump($userProfile->getMesFollowers());



			}
		else
			{
				header("Location: index.php");
			}

?>