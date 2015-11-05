<?php
  $myProfile=false;
  if ($userProfile->getId()==$user->getId())
    {
      $myProfile=true;
    }

?>
<div class="full col-sm-9" style=" background: url(<?php echo $userProfile->getPhotoCover(); ?>) no-repeat center top fixed; background-size: cover;">

<!-- content -->                      
<div class="row" >

<!-- main col left --> 
<div class="col-sm-5" >

  <div class="panel panel-default">
    <div class="panel-thumbnail"><img src="<?php echo $userProfile->getPhoto(); ?>" class="img-responsive"></div>
    <div class="panel-body">
      <p class="lead"><?php echo $userProfile->getUserName(); ?></p>
        <?php
          if($myProfile)
          {
            ?>
            <p><a href="index.php?page=setupProfil" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-cog"></i> Edit my profile</a></p>
            <?php
          }

        ?>
      <?php
        //var_dump($userProfile);
        if ($userProfile->getFollowing())
            {
              ?>
                <a href="index.php?page=unFollow&id=<?php echo $userProfile->getId(); ?>"><button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" >Unfollow</button></a>
              <?php
            }
          else
          {
            ?>
              <a href="index.php?page=addFollow&id=<?php echo $userProfile->getId(); ?>"><button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" >Follow</button></a>
            <?php
          }
      ?>
      
      <p><a href="index.php?page=followers&userId=<?php echo $userProfile->getId(); ?>"><?php echo count($userProfile->getMesFollowers()->getListeUsers()); ?> Followers</a>, <?php echo count($userProfile->getMesGabs()->getListePosts()); ?> Gabs</p>
      
      <p>
        
      </p>
    </div>
  </div>
  <div class="panel panel-default">
     <div class="panel-heading"> <h4>More Data</h4></div>
      <div class="panel-body">
        
        <div class="clearfix"></div>
        <?php
          if ($userProfile->getNom()!='')
            {
              ?>
                Last name: <?php echo $userProfile->getNom(); ?><br/>
              <?php
            } 
            ?>
            <?php
          if ($userProfile->getPrenom()!='')
            {
              ?>
                Frist name: <?php echo $userProfile->getPrenom(); ?><br/>
              <?php
            } 

            if ($userProfile->getMail()!='')
            {
              ?>
                Mail: <?php echo $userProfile->getMail(); ?><br/>
              <?php
            } 
          
            ?>

        <hr>
          <a href="index.php?page=usersIFollow&userId=<?php echo $userProfile->getId(); ?>">
            <?php echo $userProfile->getUserName(); ?> Follows <?php echo count($userProfile->getUsersIFollow()->getListeUsers()); ?> users
          </a>
      </div>
  </div>