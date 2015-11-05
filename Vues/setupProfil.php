<?php
  include("Blocs/Header.php");
?>
  <body>
<div class="wrapper">
    <div class="box" >
        <div class="row row-offcanvas row-offcanvas-left">

            <!-- main right col -->
            <div class="column col-sm-12 col-xs-11" id="main">
             <!--   <div class="column col-sm-10 col-xs-11" id="main"> -->
                
                <?php
                   include("Blocs/NavBar.php");
                ?>
              
                <div class="padding" style="background-image: url(<?php echo $user->getPhotoCover(); ?>);">
                    <div  style=" background: url(<?php echo $user->getPhotoCover(); ?>) no-repeat center top fixed; background-size: cover;">
                      <?php
                      $userProfile=$user;
                      include('Blocs/infoProfil.php');

                    ?>
                    

                              
                           
                          </div>
                          
                          <!-- main col right -->
                          <div class="col-sm-7">
                               
                               
                      
                               <div class="panel panel-default">
                                 <div class="panel-heading"> <h4>Edit my profile</h4></div>
                                  <div class="panel-body">
                                    
                                    <div class="clearfix"></div>
                                    
                                   <div class="form-horizontal">
                                            
                                            <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="prenom">First Name</label>  
                                              <div class="col-md-4">
                                              <input id="prenom" name="prenom" value="<?php echo $user->getNom(); ?>" class="form-control input-md" type="text">
                                                
                                              </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="nom">Last Name</label>  
                                              <div class="col-md-4">
                                              <input id="nom" name="nom" value="<?php echo $user->getPrenom(); ?>" class="form-control input-md" type="text">
                                                
                                              </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="mail">Email</label>  
                                              <div class="col-md-4">
                                              <input id="mail" name="mail" value="<?php echo $user->getMail(); ?>" class="form-control input-md" type="text">
                                                
                                              </div>
                                            </div>

                                           

                                            <!-- Button -->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="save"></label>
                                              <div class="col-md-4">
                                                <button class="btn btn-success" onclick="updateProfile()">Save</button>
                                              </div>
                                            </div>

                                            
                                      </div>
                                  </div>
                               </div>
                               <div class="panel panel-default">
                                 <div class="panel-heading"> <h4>Edit my profile picture</h4></div>
                                  <div class="panel-body">
                                    
                                    <div class="clearfix"></div>
                                    <?php 
                                      // var_dump($_FILES); 
                                      // var_dump($resultat);

                                    ?>
                                  <form id="uploadImage" method="post" action="index.php?page=setupProfil&action=editPic" runat="server" enctype="multipart/form-data" class="form-horizontal">
          
                                            
                                          

                                            <!-- File Button --> 
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="profilePic">Profile Pic</label>
                                              <div class="col-md-4">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />
                                                <input id="photo" name="photo" class="input-file" type="file">
                                              </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="save"></label>
                                              <div class="col-md-4">
                                                <button id="save" name="save" class="btn btn-success" >Save</button>
                                              </div>
                                            </div>

                                            
                                      </form>
                                    

                                  </div>
                               </div>

                               <div class="panel panel-default">
                                 <div class="panel-heading"> <h4>Edit my Cover picture</h4></div>
                                  <div class="panel-body">
                                    
                                    <div class="clearfix"></div>
                                    <?php 
                                      // var_dump($_FILES); 
                                      // var_dump($resultat);

                                    ?>
                                  <form id="uploadImage" method="post" action="index.php?page=setupProfil&action=editCoverPic" runat="server" enctype="multipart/form-data" class="form-horizontal">
          
                                            
                                          

                                            <!-- File Button --> 
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="coverPic">Cover Pic</label>
                                              <div class="col-md-4">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />
                                                <input id="photo" name="photo" class="input-file" type="file">
                                              </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="form-group">
                                              <label class="col-md-4 control-label" for="save"></label>
                                              <div class="col-md-4">
                                                <button id="save" name="save" class="btn btn-success" >Save</button>
                                              </div>
                                            </div>

                                            
                                      </form>
                                      <form id="uploadImage" method="post" action="index.php?page=setupProfil&action=deleteCoverPic" runat="server" enctype="multipart/form-data" class="form-horizontal">
                                        <button id="deleteCoverPic" name="deleteCoverPic" class="btn btn-danger pull-right" >Delete cover pic</button>
                                      </form>
                                  </div>
                               </div>
                            
                               
                            
                               
                            
                          </div>
                       </div><!--/row-->
                      
                    
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="#" class="pull-right">SUPINFO B3 PROJECT</a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h4 class="text-center">
                      <a href="#" target="ext">Gabbler</a>
                      </h4>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
      </div>  
      </div>
  </div>
  </div>
</div>

<!--  modales -->
<div id="confirmationUpdateProfile" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title">Modifications saved</h4>

            </div>

            <div class="modal-body">
                <p></p>
                <p style="padding:5px">Your profile has been updated</p>
                <p></p>
               

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

               <!--  <button type="button" class="btn btn-primary">Save changes</button> -->

            </div>

        </div>

    </div>

</div>





  <!-- script references -->
  <?php 
    include ('Blocs/javaScript.php');

  ?>
    
  </body>
</html>