<?php
	
	//index.php?page=users&api=true
	//index.php?page=users&api=true&idUser=2
	//index.php?page=users&api=true&userName=seb
	


	

	if(isset($_GET['api']) && $_GET['api']==true)
	{
		if (isset($_GET['idUser']) || isset($_GET['userName']))
		{
			include('Modeles/oneUser.php');
		}
		else
		{
			include('Modeles/allUsers.php');
		}

		include_once('Vues/api/users.php');
	}
	

?>