<?php
//Si on a un GET page
if (!empty($_GET['page']) && is_file('Controleurs/'.$_GET['page'].'.php'))
{
	
		//include_once ('./Modeles/conexionBDD.php');
		include ('Controleurs/'.$_GET['page'].'.php');
	
}
?>