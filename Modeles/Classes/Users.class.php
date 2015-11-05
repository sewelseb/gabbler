<?php
	require_once('Posts.class.php');
	require_once('ListePosts.class.php');
	require_once('ListUsers.class.php');


	class Users
	{
		private $_userName;
		private $_nom;
		private $_prenom;
		private $_photo;
		private $_password;
		private $_passwordConfirmation;
		private $_email;
		private $_id;
		private $_clef;
		private $_mesGabs;
		private $_mesFollowers;
		private $_usersIFollow;
		private $_following; //bool pour savoire si je follow cet utilisateur
		private $_photoCover;



		public function getUserName()
			{
				return $this->_userName;
			}
		public function getPassword()
			{
				return $this->_password;
			}
		public function getPasswordConfirmation()
			{
				return $this->_passwordConfirmation;
			}
		public function getId()
			{
				return $this->_id;
			}
		public function getClef()
			{
				return $this->_clef;
			}
		public function getMail()
			{
				return $this->_mail;
			}
		public function getNom()
			{
			return $this->_nom;
			}
		public function getPrenom()
			{
				return $this->_prenom;
			}
		public function getPhoto()
			{
				return $this->_photo;
			}
		public function getMesGabs()
		{
		return $this->_mesGabs;
		}
		public function getMesFollowers()
		{
		return $this->_mesFollowers;
		}
		public function getUsersIFollow()
		{
		return $this->_usersIFollow;
		}
		public function getFollowing()
		{
		return $this->_following;
		}
		public function getPhotoCover()
		{
		return $this->_photoCover;
		}

		public function setPhotoCover($arg)
		{
		$this->_photoCover=$arg;
		}
		public function setFollowing($arg)
		{
		$this->_following=$arg;
		}
		public function setMesGabs($arg)
		{
		$this->_mesGabs=$arg;
		}
		public function setMesFollowers($arg)
		{
		$this->_mesFollowers=$arg;
		}
		public function setUsersIFollow($arg)
		{
		$this->_usersIFollow=$arg;
		}
		public function setNom($arg)
			{
				$this->_nom=$arg;
			}
		public function setPrenom($arg)
			{
				$this->_prenom=$arg;
			}
		public function setPhoto($arg)
			{
				$this->_photo=$arg;
			}
		public function setUserName($arg)
			{
				$this->_userName=$arg;
			}
		public function setPassword($arg)
			{
				$this->_password=$arg;
			}
		public function setPasswordConfirmation($arg)
			{
				$this->_passwordConfirmation=$arg;
			}
		public function setId($arg)
			{
				$this->_id=$arg;
			}
		public function setMail($arg)
			{
				$this->_mail=$arg;
			}
		public function setClef($arg)
			{
				$this->_clef=$arg;
			}
				
		function __construct()
			{
				
			}
		public function setIdWithUserName($userName, $bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name=\''.$userName.'\')');
				while ($user=$listeUsers->fetch())
					{
						$this->setId($user['id']);
					}
			}
		//retour 1 si password différent, 2 si le nom d'utilisateur existe deja, et 0 si réussite
		public function hydrateInscription($userName, $password, $passwordConfirmation, $email, $bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name=\''.$userName.'\')');
				if (is_object($listeUsers))
					{
						while ($user=$listeUsers->fetch())
							{
								return 2;
							}
					}
				
				if ($passwordConfirmation!=$password)
				{
					header("Location: register.php?message=mauvaisNonCoherent");
					return 1;

				}
				else
				{
					$this->setUserName($userName);
					$this->setPassword($password);
					$this->setPasswordConfirmation($passwordConfirmation);
					$this->setMail($email);
					return 0;
				}
				


			}
		public function hydrateConexion($userName, $password)
			{
				$this->setUserName($userName);
				$this->setPassword($password);
			}
		public function hydrateFromBDD($bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name=\''.$_SESSION['userName'].'\')');
				while ($user=$listeUsers->fetch())
					{
						if ($user['clef']==$_SESSION['clef'])
							{
								$this->setUserName($user['user_name']);
								$this->setClef($user['clef']);
								$this->setId($user['id']);
								$this->setMail($user['email']);	
								$this->setNom($user['nom']);
								$this->setPrenom($user['prenom']);
								$this->setPhoto($user['photo']);
								$this->setPhotoCover($user['cover_pic']);
						
							}
					}
			}
		//l'id vient des setter
		public function hydrateFromBDDWithId($bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (id=\''.$this->getId().'\')');
				while ($user=$listeUsers->fetch())
					{
								
								$this->setUserName($user['user_name']);
								$this->setClef($user['clef']);
								$this->setId($user['id']);
								$this->setMail($user['email']);	
								$this->setNom($user['nom']);
								$this->setPrenom($user['prenom']);
								$this->setPhoto($user['photo']);
								$this->setPhotoCover($user['cover_pic']);
								$this->setPeapleIFollowFromBDD($bdd);
									
									
									
							
					}
			}
		//fonction qui retrouve les autres posts, les gents que je follow, les gents qui me follow,...
		public function hydrateFromOtherTable($bdd)
			{
				//1) récupération de mes posts
				$this->getAllMyGabs($bdd);
				$this->getAllMyFollowers($bdd);
				$this->setPeapleIFollowFromBDD($bdd);
				
				//var_dump($this->getMesGabs());
			}
		public function getAllMyGabs($bdd)
			{
				$i=0;
				$listeGabs = new ListePosts();
				$mesPosts = array();
				$listePosts=$bdd->query('SELECT * FROM posts WHERE (id_user='.$this->getId().') ORDER BY id DESC');
				while ($item=$listePosts->fetch())
					{
						$post = new Posts();
						$post->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'], $bdd);
						$mesPosts[$i]=$post;
						$i++;
					}
				$listeGabs->setListePosts($mesPosts);
				if (isset($mesPosts))
				{
					$this->setMesGabs($listeGabs);
				}

			}
		public function getAllMyFollowers($bdd)
			{
				$i=0;
				$listOfUsers = new ListUsers();
				$mesFollowers = array();
				$listeFollowers=$bdd->query('SELECT * FROM follower WHERE (id_followed='.$this->getId().')');
				while ($item=$listeFollowers->fetch())
					{
						$user = new Users();
						$user->setId($item['id_follower']);
						$user->hydrateFromBDDWithId($bdd);
						$user->getAllMyGabs($bdd);
						$user->setIdpeapleFollowMeFromBdd($bdd);
						$mesFollowers[$i]=$user;
						$i++;
					}

				$listOfUsers->setListeUsers($mesFollowers);
				$this->setMesFollowers($listOfUsers);
			}
		public function setIdpeapleFollowMeFromBdd($bdd)
			{
				$i=0;
				$listOfUsers = new ListUsers();
				$mesFollowers = array();
				$listeFollowers=$bdd->query('SELECT * FROM follower WHERE (id_followed='.$this->getId().')');
				while ($item=$listeFollowers->fetch())
					{
						$user = new Users();
						$user->setId($item['id_follower']);
						// $user->hydrateFromBDDWithId($bdd);
						// $user->getAllMyGabs($bdd);
						//$user->setIdpeapleFollowMeFromBdd($bdd);
						$mesFollowers[$i]=$user;
						$i++;
					}

				$listOfUsers->setListeUsers($mesFollowers);
				$this->setMesFollowers($listOfUsers);
			}
		public function setPeapleIFollowFromBDD($bdd)
			{
				$i=0;
				$listOfUsers = new ListUsers();
				$mesFollowed = array();
				include ('./Modeles/Blocs/connexionBDD.php');
				//var_dump($bdd);
				$listeFollowers = $bdd->query('SELECT * FROM follower WHERE (id_follower='.$this->getId().')');
				while ($item=$listeFollowers->fetch())
					{
						$user = new Users();
						//echo $item['id_followed'];
						$user->setId($item['id_followed']);
						//$user->hydrateFromBDD($bdd);
						//$user->getAllMyGabs($bdd);
						//$user->setIdpeapleIFollowFromBdd($bdd);
						//var_dump($user);
						$mesFollowed[$i]=$user;
						$i++;
					}
				//var_dump($mesFollowed);
				$listOfUsers->setListeUsers($mesFollowed);
				
				$this->setUsersIFollow($listOfUsers);
			}
		public function hydrateFollowing($bdd)
			{
				//var_dump($this->getUsersIFollow()->getListeUsers());
				 foreach ($this->getUsersIFollow()->getListeUsers() as $user) 
				 	{
				 		$user->hydrateFromBDDWithId($bdd);
				 		$user->hydrateFromOtherTable($bdd);
				 	}
			}
		public function hydrateTotal($bdd)
			{
				$this->hydrateFromBDD($bdd);
				$this->hydrateFromOtherTable($bdd);

			}
		public function hydrateTotalWithId($bdd)
			{
				$this->hydrateFromBDDWithId($bdd);
				$this->hydrateFromOtherTable($bdd);

			}
		public function inscription($bdd)
			{
				//TODO: verifier que le pseudo n'existe pas encor
				$mdpCripte=$this->crypt($this->getPassword());
				$bdd->exec('INSERT INTO users (user_name, password, email) VALUES(\'' .$this->getUserName(). '\', \'' .$mdpCripte. '\', \'' .$this->getMail(). '\')');
			}
		public function updateProfile($bdd)
			{
				//echo 'UPDATE `users` SET `nom`=\''.$this->getNom(). '\', `prenom`='.$this->getPrenom().', `email`='.$this->getMail().' WHERE id='.$this->getId(). '';
				$bdd->query('UPDATE `users` SET `nom`=\''.addslashes($this->getNom()). '\', `prenom`=\''.addslashes($this->getPrenom()).'\', `email`=\''.addslashes($this->getMail()).'\', `photo`=\''.addslashes($this->getPhoto()).'\', `cover_pic`=\''.addslashes($this->getPhotoCover()).'\' WHERE id='.$this->getId(). '' );
			}
		public function conexion($bdd)
			{
				$retour=0;
				$mdpCripte=$this->crypt($this->getPassword());
				echo ($mdpCripte);
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name=\''.$this->getUserName().'\')');
				while ($user=$listeUsers->fetch())
					{
						if ($user['password']==$mdpCripte)
							{
									
									$clef=time();
									$bdd->exec('UPDATE users SET clef=\''.$clef. '\' WHERE ID=\''.$user['id']. '\'');
									$_SESSION['clef']=$clef;
									//setcookie("id", $user['id'], time()+3600);
									$_SESSION['id'] = $user['id'];
									$_SESSION['userName'] = $this->getUserName();
									$retour=1;
							}
					}
				return $retour;
			}
		public function crypt($data)
		  {
		      $cipher= 'rijndael-256';
		      $mode    = 'cbc'; 
		      $keyHash = md5('Pokemon attrapez les tous');
		      $key = substr($keyHash, 0,   mcrypt_get_key_size($cipher, $mode) );
		      $iv  = substr($keyHash, 0, mcrypt_get_block_size($cipher, $mode) );
	      
		      $data = mcrypt_encrypt($cipher, $key, $data, $mode, $iv);
		      return base64_encode($data);
		  }
	  	//si conecté, il renvoit 1, si non, 0
	  	public function verificationConecte($bdd)
	  		{
	  			$retour=0;
				
				
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name=\''.$_SESSION['userName'].'\')');
				while ($user=$listeUsers->fetch())
					{
						if ($user['clef']==$_SESSION['clef'])
							{
									
									
									
									$retour=1;
							}
					}
				return $retour;
	  		}
  		public function addFollower($idFollowed, $bdd)
  			{
  				if(!$this->existanceFollower($idFollowed, $this->getId(),$bdd))
  				{
  					$bdd->exec('INSERT INTO follower (id_follower, id_followed) VALUES(\'' .$this->getId(). '\', \'' .$idFollowed. '\')');
  				}
  				
  			}
		public function unFollower($idFollowed, $bdd)
			{
				$bdd->exec('DELETE FROM follower WHERE (id_follower=\'' .$this->getId(). '\' AND id_followed=\'' .$idFollowed. '\')');
			}
		//retourne un booléen
		public function existanceFollower($idFollowed, $idFollower,$bdd)
			{
				$retour=false;
				$listeFollower=$bdd->query('SELECT * FROM follower WHERE (id_follower=\''.$idFollower.'\' && id_followed=\''.$idFollowed.'\')');
				while ($item=$listeFollower->fetch())
					{
						$retour=true;
					}
				return $retour;
			}
		//retourne un booléen
		public function amIFollowing($monId, $bdd)
			{
				$this->setFollowing(false);
				$listeFollower=$bdd->query('SELECT * FROM follower WHERE (id_follower=\''.$monId.'\' && id_followed=\''.$this->getId().'\')');
				while ($item=$listeFollower->fetch())
					{
						$this->setFollowing(true);
					}
			}
		public function toArray()
			{
				$retour= array();
				
				// private $_userName;
				// private $_nom;
				// private $_prenom;
				// private $_photo;
				// private $_password;
				// private $_passwordConfirmation;
				// private $_email;
				// private $_id;
				// private $_clef;
				// private $_mesGabs;
				// private $_mesFollowers;
				// private $_usersIFollow;
				// private $_following; //bool pour savoire si je follow cet utilisateur
				// private $_photoCover;
				$retour['id']=$this->getId();
				$retour['userName']=$this->getUserName();
				$retour['name']=$this->getNom();
				$retour['firstname']=$this->getPrenom();
				$retour['profilePic']=$this->getPhoto();
				$retour['coverPic']=$this->getPhotoCover();
				$retour['email']=$this->getMail();
				$retour['numberOfGab']=count($this->getMesGabs()->getListePosts());
				$retour['numberOfFollowers']=count($this->getMesFollowers()->getListeUsers());
				$retour['numberOfUsersIFollow']=count($this->getUsersIFollow()->getListeUsers());


				return $retour;
			}
	}
?>