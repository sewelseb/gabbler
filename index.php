<?php
//FrontControler
//démarage de la session
//session_start();
session_cache_limiter('private_no_expire, must-revalidate');
setlocale (LC_TIME, 'fr_FR'); 
date_default_timezone_set('Europe/Berlin');

//initialisation du tampon=> tout le code html va dedant et ressortira lorsque on mettra la fonction ob_end_flush()
ob_start();

//error display (à commenter en prod)
error_reporting(E_ALL);
ini_set("display_errors", 1);

//Si on a un GET page
if (!empty($_GET['page']) && is_file('Controleurs/'.$_GET['page'].'.php'))
{
	//require_once ('./Modeles/webConfig.php');
	//on check le GET
	$tabSecurite= explode("..", $_GET['page']);
	if (substr($_GET['page'], 0)=="." || count($tabSecurite)>1)
	{
		header ('location: /Accueil');
	}
	else
	{
		//include_once ('./Modeles/conexionBDD.php');
		include ('Controleurs/'.$_GET['page'].'.php');
	}
}
else
{
	//require_once ('./Modeles/webConfig.php');
	$pseudo="";
	$clefCOOKIE="";
	$clefBDD="";
	//include ('./Modeles/conexionBDD.php');
	if (isset($_COOKIE['pseudo']))
	{
		$pseudo=$_COOKIE['pseudo'];
	}
	if (isset($_COOKIE['clef']))
	{
		$clefCOOKIE=$_COOKIE['clef'];
	}

	//$ronflexe=$bdd->query('SELECT*FROM clients WHERE pseudo=\''.$pseudo.'\'');
	/*while ($pikachu=$ronflexe->fetch())
	{
		$clefBDD= $pikachu ['clef'];
	}*/

	if (($clefCOOKIE==$clefBDD) && ($pseudo!='') && ($clefCOOKIE!=''))
	{
		include ('Controleurs/home.php');
	}
	else
	{
		include ('Controleurs/Accueil.php');
	}
}

ob_end_flush(); //affichage du code html et autre

//fermeture de la conexion à la bdd
if (isset($bdd))
{
	$bdd = null;
}
?>

