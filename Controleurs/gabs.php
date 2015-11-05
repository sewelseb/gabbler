
<?php
	
	//index.php?page=gabs&api=true
	//index.php?page=gabs&api=true&idUser=2
	//index.php?page=gabs&api=true&userName=seb
	//index.php?page=gabs&api=true&idGab=2


	

	if(isset($_GET['api']) && $_GET['api']==true)
	{
		if (isset($_GET['idUser']) || isset($_GET['userName']))
		{
			include('Modeles/gabsForAUser.php');
		}
		else if (isset($_GET['idGab']))
		{
			include('Modeles/gabsById.php');
		}
		else
		{
			include('Modeles/gabs.php');
		}

		include_once('Vues/api/gabs.php');
	}
	

?>