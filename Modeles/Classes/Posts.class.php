<?php
	/**
	* 
	*/
	class Posts
	{
		private $_id;
		private $_idUser;
		private $_text;
		private $_idPostOrigin;
		private $_like;
		private $_userName;
		private $_userProfilePic;
		private $_nombreDeReGab;
		private $_liking;

		public function getId()
		{
		return $this->_id;
		}
		public function getIdUser()
		{
		return $this->_idUser;
		}
		public function getText()
		{
		return $this->_text;
		}
		public function getIdPostOrigin()
		{
		return $this->_idPostOrigin;
		}
		public function getLike()
		{
		return $this->_like;
		}
		public function getUserName()
		{
		return $this->_userName;
		}
		public function getUserProfilePic()
		{
		return $this->_userProfilePic;
		}
		public function getNombreDeReGab()
		{
		return $this->_nombreDeReGab;
		}
		public function getLiking()
		{
		return $this->_liking;
		}

		public function setLiking($arg)
		{
		$this->_liking=$arg;
		}
		public function setLike($arg)
		{
		$this->_like=$arg;
		}
		public function setUserName($arg)
		{
		$this->_userName=$arg;
		}
		public function setUserProfilePic($arg)
		{
		$this->_userProfilePic=$arg;
		}
		public function setNombreDeReGab($arg)
		{
		$this->_nombreDeReGab=$arg;
		}
		public function setId($arg)
		{
		$this->_id=$arg;
		}
		public function setIdUser($arg)
		{
		$this->_idUser=$arg;
		}
		public function setText($arg)
		{
		$this->_text=substr($arg, 0, 255);
		}
		public function setIdPostOrigin($arg)
		{
		$this->_idPostOrigin=$arg;
		}

		public function hydrate($id, $idUser, $text, $idPostOrigin, $likes,$bdd)
			{
				$this->setId($id);
				$this->setIdUser($idUser);
				$this->setText($text);
				$this->setIdPostOrigin($idPostOrigin);
				$this->setLike($likes);
				$this->getAllData($bdd);

			}
		public function hydrateFromBDD($bdd)
			{
				$listePosts=$bdd->query('SELECT * FROM posts WHERE (id='.$this->getId().')');
				
				while ($item=$listePosts->fetch())
					{
						$this->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'],$bdd);
					}
			}
		public function updateBDD($bdd)
			{
				$bdd->query('UPDATE `posts` SET `id_user`=\''.addslashes($this->getIdUser()). '\', `text`=\''.addslashes($this->getText()).'\', `likes`=\''.addslashes($this->getLike()).'\' WHERE id='.$this->getId(). '' );
			}
		public function getAllData($bdd)
			{
				$this->setInfoUserFromBdd($bdd);
				$this->setNombreRegabFromBdd($bdd);
				$this->doILikeTheGab($bdd);
			}
		public function doILikeTheGab($bdd)
			{
				
				$this->setLiking(false);
				if (isset($_SESSION['id']))
				{
					$listeLikes=$bdd->query('SELECT * FROM my_likes WHERE (id_user='.$_SESSION['id'].' AND id_posts='.$this->getId().')');
					//echo 'SELECT * FROM my_likes WHERE (id_user='.$_SESSION['id'].' AND id_posts='.$this->getId().')';
					//var_dump($listeLikes);
					if (is_object($listeLikes))
					{
						while ($item=$listeLikes->fetch())
						{
							$this->setLiking(true);
						}
					}
				}
				
				
			}
		public function setTextFromPostOrigin($bdd)
			{
				$listePosts=$bdd->query('SELECT * FROM posts WHERE (id='.$this->getIdPostOrigin().')');
				//echo('test');
				while ($item=$listePosts->fetch())
					{
						$this->setText($item['text']);
						if ($item['id_post_origin']!=-1)
						{
							$this->setIdPostOrigin($item['id_post_origin']);
						}
						//echo('test');
					}
			}
		public function regiterReGab($bdd)
			{
				$bdd->exec('INSERT INTO posts (id_user, text, id_post_origin) VALUES('.$this->getIdUser(). ', \'' .addslashes($this->getText()). '\', ' .$this->getIdPostOrigin(). ')');
			}
		public function setInfoUserFromBdd($bdd)
			{
				
				$listeUsers=$bdd->query('SELECT * FROM users WHERE (id=\''.$this->getIdUser().'\')');
				while ($user=$listeUsers->fetch())
					{
						$this->setUserName($user['user_name']);
						$this->setUserProfilePic($user['photo']);
					}

			}
		public function setNombreRegabFromBdd($bdd)
			{
				if ($this->getIdPostOrigin()==-1)
				{
					$listePosts=$bdd->query('SELECT * FROM posts WHERE (id_post_origin='.$this->getId().')');
				}
				else
				{
					$listePosts=$bdd->query('SELECT * FROM posts WHERE (id_post_origin='.$this->getIdPostOrigin().')');
				}
				
				$compteur=0;
				while ($item=$listePosts->fetch())
					{
						$compteur++;
					}
				$this->setNombreDeReGab($compteur);
			}
		public function newPost($idUser, $text, $bdd)
			{

				
				$this->setIdUser($idUser);
				$this->setText($text);
				$this->setIdPostOrigin(-1);
				

				$bdd->exec('INSERT INTO posts (id_user, text, id_post_origin) VALUES('.$this->getIdUser(). ', \'' .addslashes($this->getText()). '\', ' .$this->getIdPostOrigin(). ')');
			}
		public function addLike($userId, $bdd)
			{

				if(!$this->existanceLike($userId,$bdd))
				{
					$bdd->exec('INSERT INTO my_likes (id_posts, id_user) VALUES(\'' .$this->getId(). '\', \'' .$userId. '\')');

					$this->hydrateFromBDD($bdd);
					$this->setLike($this->getLike()+1);
					$this->updateBDD($bdd);


				}

				

			}
		public function removeLike($userId, $bdd)
			{
				if($this->existanceLike($userId,$bdd))
				{
					$bdd->exec('DELETE FROM my_likes WHERE (id_posts=\'' .$this->getId(). '\' AND id_user=\'' .$userId. '\' )');

					$this->hydrateFromBDD($bdd);
					$this->setLike($this->getLike()-1);
					$this->updateBDD($bdd);


				}
			}
		//retourne un booléen
		public function existanceLike($userId, $bdd)
			{
				$retour = false;
				$listeLike=$bdd->query('SELECT * FROM my_likes WHERE (id_posts='.$this->getId().' && id_user='.$userId.')');
				$compteur=0;
				while ($item=$listeLike->fetch())
					{
						$retour= true;
					}
				return $retour;
			}
		public function deleteGab($userId, $bdd)
			{
				if ($userId==$this->getIdUser())
				{
					$bdd->exec('DELETE FROM posts WHERE (id=' .$this->getId(). ')');
				}
			}
		public function toArray()
			{
				$retour= array();
				// private $_id;
				// private $_idUser;
				// private $_text;
				// private $_idPostOrigin;
				// private $_like;
				// private $_userName;
				// private $_userProfilePic;
				// private $_nombreDeReGab;
				// private $_liking;
				$retour['id']=$this->getId();
				$retour['idUser']=$this->getIdUser();
				$retour['userName']=$this->getUserName();
				$retour['text']=$this->getText();
				$retour['idPostOrigin']=$this->getIdPostOrigin();
				$retour['like']=$this->getLike();
				$retour['nuberOfRegab']=$this->getNombreDeReGab();


				return $retour;
			}
	}


?>