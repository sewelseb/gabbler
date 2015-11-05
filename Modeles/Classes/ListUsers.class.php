<?php

	require_once ('Users.class.php');
	/**
	* 
	*/
	class ListUsers
	{
		private $_listeUsers;

		public function getListeUsers()
		{
		return $this->_listeUsers;
		}

		public function setListeUsers($arg)
		{
		$this->_listeUsers=$arg;
		}

		public function hydrate($listeUsers)
		{
		$this->setListeUsers($listeUsers);

		}

		function __construct()
		{
			
		}

		public function searchFromBdd($serach, $bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (user_name like \'%'.$serach.'%\' OR email like \'%'.$serach.'%\' OR nom like \'%'.$serach.'%\' OR prenom like \'%'.$serach.'%\')');
				//var_dump($listeUsers);
				$i=0;
				while ($item=$listeUsers->fetch())
					{
						$userItem = new Users();
						//var_dump($item);
						$userItem->setId($item['id']);
						$userItem->hydrateTotalWithId($bdd);
						
						$listUsers[$i]=$userItem;
						$i++;
					}
				$this->setListeUsers($listUsers);
				//var_dump($this->getListeUsers());

			}
		public function getAllUsers($bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users');
				//var_dump($listeUsers);
				$i=0;
				while ($item=$listeUsers->fetch())
					{
						$userItem = new Users();
						//var_dump($item);
						$userItem->setId($item['id']);
						$userItem->hydrateTotalWithId($bdd);
						
						$listUsers[$i]=$userItem;
						$i++;
					}
				$this->setListeUsers($listUsers);
			}
		public function getListeByIdUser($id, $bdd)
			{
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (id=\''.$id.'\')');
				//var_dump($listeUsers);
				$i=0;
				while ($item=$listeUsers->fetch())
					{
						$userItem = new Users();
						//var_dump($item);
						$userItem->setId($item['id']);
						$userItem->hydrateTotalWithId($bdd);
						
						$listUsers[$i]=$userItem;
						$i++;
					}
				$this->setListeUsers($listUsers);
			}
		public function toArray()
			{
				$retour=array();
				$i=0;
				foreach ($this->getListeUsers() as $user) 
				{
					$retour[$i]=$user->toArray();
					$i++;
				}


				return $retour;
			}
	}


?>