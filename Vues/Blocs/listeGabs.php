<?php	
	//attention à bien placer la liste des users dans la bonne variable: $listGabs
	if (is_array($listGabs->getListePosts()))
  {
	foreach ($listGabs->getListePosts()as $gabItem) 
	{
		
	
?>
<div id="gabItem<?php echo $gabItem->getId(); ?>">
	<div class="panel panel-default">
     <div class="panel-heading">
      <?php
        if ($gabItem->getIdUser()==$user->getId())
        {
          ?>
            <button class="pull-right btn btn-default" id="deleteGab<?php echo $gabItem->getId(); ?>" onclick="deleteGab(<?php echo $gabItem->getId(); ?>)">Delete gab</button>
          <?php
        }


      ?> 
      
      <h4><a href="index.php?page=Profil&userId=<?php echo $gabItem->getIdUser();?>"><?php echo $gabItem->getUserName(); ?></a></h4></div>
      <div class="panel-body">
        <img src="<?php echo $gabItem->getUserProfilePic(); ?>" class="img-circle pull-right"> <?php echo $gabItem->getText(); ?>
        <div class="clearfix"></div>

        <?php
        	if ($gabItem->getIdPostOrigin()!=-1)
        	{


        ?>
        <!-- <hr>
        
        <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p> -->
        <?php
        	}
        ?>
        
        <hr>
        
        <div class="input-group">
    	  <p><span id="nbrOfLikes<?php echo $gabItem->getId(); ?>"><?php echo $gabItem->getLike(); ?></span> likes and <span id="nbrOfLikes<?php echo $gabItem->getId(); ?>"><?php echo $gabItem->getNombreDeReGab(); ?></span> regabs</p>
          <div class="input-group-btn">
          	<span id="bouttonLike<?php echo $gabItem->getId(); ?>">
          	<?php
          		//var_dump($gabItem);
          		if ($gabItem->getLiking()) 
          		{
          			?>
          			 <button class="btn btn-default" onclick="removeLike(<?php echo $gabItem->getId(); ?>)" id="addLike<?php echo $gabItem->getId(); ?>">-1</button>
          			 <?php
          		}
          		else
      			{
      				?>
      				 <button class="btn btn-default" onclick="addLike(<?php echo $gabItem->getId(); ?>)" id="addLike<?php echo $gabItem->getId(); ?>">+1</button>
      				 <?php
      			}
      		?>
          
      		</span>
          <button class="btn btn-default" onclick="reGab(<?php echo $gabItem->getId(); ?>)" id="reGab<?php echo $gabItem->getId(); ?>"><i class="glyphicon glyphicon-share"></i></button>
          </div>
          
        </div>
        
        
      </div>
   </div>
 </div>
<?php
	}
}
	//var_dump($listUsers);
?>