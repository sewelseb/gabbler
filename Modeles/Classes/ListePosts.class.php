<?php
	require_once('Posts.class.php');
	require_once('ListUsers.class.php');
	//permet de gérer une liste de posts
	// attention à l'oral: les arrays php sont moins optimisés que les objets
	/**
	* 
	*/
	class ListePosts
	{
		private $_listePosts;

		public function getListePosts()
		{
		return $this->_listePosts;
		}

		public function setListePosts($arg)
		{
		$this->_listePosts=$arg;
		}

		function __construct()
		{
			
		}

		public function getPostsDesAmis($listeDAmis, $bdd)
		{
			$reqSQLWhere="";
			//var_dump($listeDAmis);
			foreach ($listeDAmis->getListeUsers() as $ami) 
			{
				if($reqSQLWhere=="")
				{
					$reqSQLWhere=$reqSQLWhere."id_user=".$ami->getId();
				}
				else 
				{
					$reqSQLWhere=$reqSQLWhere." OR id_user=".$ami->getId();
				}
			{

			}
			}
			if($reqSQLWhere!="")
			{
				//echo $reqSQLWhere;
				$i=0;
				$listePosts=$bdd->query('SELECT * FROM posts WHERE ('.$reqSQLWhere.') ORDER BY id DESC');
				//var_dump($listePosts);
				$list = array();
				while ($item=$listePosts->fetch())
					{
						$post= new Posts();
						$post->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'],$bdd);
						$list[$i]=$post;
						$i++;
					}
				$this->setListePosts($list);
			}
		}
		public function getAllGabs($bdd)
		{

			$listePosts=$bdd->query('SELECT * FROM posts');
			$liste= array();
			$i=0;
			while ($item=$listePosts->fetch())
				{
					$post= new Posts();
					$post->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'],$bdd);
					$liste[$i]=$post;
					$i++;
				}
			$this->setListePosts($liste);
			
		}
		public function getListeByIdUser($idUser, $bdd)
			{
				$liste= array();
				$i=0;
				$listePosts=$bdd->query('SELECT * FROM posts WHERE (id_user='.$idUser.') ORDER BY id DESC');
				while ($item=$listePosts->fetch())
					{
						$post= new Posts();
					$post->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'],$bdd);
					$liste[$i]=$post;
					$i++;
					}
				$this->setListePosts($liste);
			}
		public function getGabById($idGab, $bdd)
			{
				$liste= array();
				$i=0;
				$listePosts=$bdd->query('SELECT * FROM posts WHERE (id='.$idGab.') ORDER BY id DESC');
				while ($item=$listePosts->fetch())
					{
						$post= new Posts();
					$post->hydrate($item['id'], $item['id_user'], $item['text'], $item['id_post_origin'], $item['likes'],$bdd);
					$liste[$i]=$post;
					$i++;
					}
				$this->setListePosts($liste);
			}
		public function toArray()
			{
				$retour=array();
				$i=0;
				foreach ($this->getListePosts() as $user) 
				{
					$retour[$i]=$user->toArray();
					$i++;
				}


				return $retour;

			}
	}



?>