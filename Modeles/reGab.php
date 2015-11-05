<?php
	
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				if(isset($_POST['idGab']))
				{
					$gab=new Posts();
					$gab->setIdPostOrigin($_POST['idGab']);
					$gab->setIdUser($user->getId());
					$gab->setTextFromPostOrigin($bdd);
					$gab->regiterReGab($bdd);
					
				}



			}
		else
			{
				header("Location: index.php");
			}

?>