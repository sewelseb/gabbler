
<?php	
	//attention à bien placer la liste des users dans la bonne variable: $listUsers
	
	foreach ($listUsers->getListeUsers() as $userItem) 
	{
		
	
?>
	<div class="panel panel-default">
		 <div class="panel-heading" ><a href="index.php?page=Profil&userId=<?php echo $userItem->getId(); ?>" class="pull-right">View Profile</a> <h4><a href="index.php?page=Profil&userId=<?php echo $userItem->getId(); ?>"><?php echo $userItem->getUserName(); ?></a></h4></div>
		  <div class="panel-body">
		    <p><img src="<?php echo $userItem->getPhoto(); ?>" class="img-circle pull-right">
		    	<?php
		    	if ($userItem->getNom()!='')
		    		{
		    			?>
		    				Last name: <?php echo $userItem->getNom(); ?><br/>
		    			<?php
		    		} 
		    		?>
		    		<?php
		    	if ($userItem->getPrenom()!='')
		    		{
		    			?>
		    				First name: <?php echo $userItem->getPrenom(); ?><br/>
		    			<?php
		    		} 
		    		?>
		    	
		    	
		    	<?php echo count($userItem->getMesGabs()->getListePosts()); ?> Gabs <br/>
		    	
		    	<?php echo count($userItem->getMesFollowers()->getListeUsers()); ?> Followers <br/>
		    </p>
		    <div class="clearfix"></div>
		    <hr>
		    	<div style="text-align:right;">
		    		 <?php
                        //var_dump($userProfile);
		    		 	$userItem->amIFollowing($user->getId(), $bdd);
                        if ($userItem->getFollowing())
                            {
                              ?>
                                <a href="index.php?page=unFollow&id=<?php echo $userItem->getId(); ?>"><button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" >Unfollow</button></a>
                              <?php
                            }
                          else
                          {
                            ?>
                              <a href="index.php?page=addFollow&id=<?php echo $userItem->getId(); ?>"><button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" >Follow</button></a>
                            <?php
                          }
                      ?>
		    	</div>
		    	
		  </div>
	</div>
<?php
	}
	//var_dump($listUsers);
?>