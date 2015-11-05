<?php
	require_once('Classes/ListePosts.class.php');
	include('Blocs/toutePageConectee.php');


	if ($conecte==1)
			{
				$listePosts = new ListePosts();
				//TODO: rechercher les postes des amis

				//le cas ou l'on édite la photo de profil:
				
				if(isset($_GET['action']) && $_GET['action']=='editPic')
				{

					if (isset ($_FILES['photo']['name']) && $_FILES['photo']['name']!='')
						{
							$maxsize=5000000;
							$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
							$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
							if ( in_array($extension_upload, $extensions_valides) ) {}
							else 
							{
								$messageInfo['code']='danger';
								$messageInfo['content']='Extension non supportée! Essayez avec un fichier au format jpg/jpeg, gif ou png.';
							}
							if ($_FILES['photo']['error'] > 0) 
							{
								$messageInfo['code']='danger';
								$messageInfo['content'] = "Erreur lors du transfert.";
							}
							if ($_FILES['photo']['size'] > $maxsize) 
							{
								$messageInfo['code']='danger';
								$messageInfo['content'] = "Le fichier est trop gros. La taille maximale autorisée est de 5Mo.";
							}
							$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
						}

					//déplacement de la photo vers le bon repertoire
					if ($messageInfo['code']!='danger' && isset ($_FILES['photo']['name']) && $_FILES['photo']['name']!='')
					{
						$test='test2';
						$nomPhoto = "./Vues/PhotoUsers/".$user->getUserName().date("d_m_h_i_s").".".$extension_upload;
						$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nomPhoto);
						if ($resultat)
						{
							$messageInfo['code']='test3';
							$transfertPhoto=true;
							$user->setPhoto($nomPhoto);
							$user->updateProfile($bdd);
						}
						else
						{
							$transfertPhoto=false;
							$messageInfo['code']='danger';
							$messageInfo['content'] = "Erreur lors du transfert.";
						}
					}

				}

				//cas ou l'on edit la photo de cover
				if(isset($_GET['action']) && $_GET['action']=='editCoverPic')
				{
					if (isset ($_FILES['photo']['name']) && $_FILES['photo']['name']!='')
						{
							$maxsize=5000000;
							$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
							$extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
							$messageInfo['code']="";
							if ( in_array($extension_upload, $extensions_valides) ) {}
							else 
							{
								$messageInfo['code']='danger';
								$messageInfo['content']='Extension non supportée! Essayez avec un fichier au format jpg/jpeg, gif ou png.';
							}
							if ($_FILES['photo']['error'] > 0) 
							{
								$messageInfo['code']='danger';
								$messageInfo['content'] = "Erreur lors du transfert.";
							}
							if ($_FILES['photo']['size'] > $maxsize) 
							{
								$messageInfo['code']='danger';
								$messageInfo['content'] = "Le fichier est trop gros. La taille maximale autorisée est de 5Mo.";
							}
							$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
						}

					//déplacement de la photo vers le bon repertoire
					if ($messageInfo['code']!='danger' && isset ($_FILES['photo']['name']) && $_FILES['photo']['name']!='')
					{
						$test='test2';
						$nomPhoto = "Vues/PhotoCoverUsers/".$user->getUserName().date("d_m_h_i_s").".".$extension_upload;
						$resultat = move_uploaded_file($_FILES['photo']['tmp_name'],$nomPhoto);
						if ($resultat)
						{
							$messageInfo['code']='test3';
							$transfertPhoto=true;
							$user->setPhotoCover($nomPhoto);
							$user->updateProfile($bdd);
						}
						else
						{
							$transfertPhoto=false;
							$messageInfo['code']='danger';
							$messageInfo['content'] = "Erreur lors du transfert.";
						}
					}



				}
				//cas ou l'on edit la photo de cover
				if(isset($_GET['action']) && $_GET['action']=='deleteCoverPic')
				{
					$user->setPhotoCover("");
					$user->updateProfile($bdd);
				}


			}
		else
			{
				header("Location: index.php");
			}

?>