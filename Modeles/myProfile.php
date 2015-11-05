<?php
	
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$userProfile = $user;
				
				$userProfile->amIFollowing($user->getId(), $bdd);

				$myProfileBool=true;



			}
		else
			{
				header("Location: index.php");
			}

?>