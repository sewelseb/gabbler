<?php
  include("Blocs/Header.php");
  
?>
	<body  >

<div class="wrapper" >

    <div class="box" style="background-image: url(<?php echo $userProfile->getPhotoCover(); ?>);">
        <div class="row row-offcanvas row-offcanvas-left">

            <!-- main right col -->
            <div class="column col-sm-12 col-xs-11" id="main">
             <!--   <div class="column col-sm-10 col-xs-11" id="main"> -->
                
                <?php
                   include("Blocs/NavBar.php");
                ?>
              
                <div class="padding">
                    <?php
                      include('Blocs/infoProfil.php');

                    ?>

                           
                              

                           		
                           
                          </div>
                          
                          <!-- main col right -->

                          <div class="col-sm-7">

                               <?php
                                  if(isset($myProfileBool))
                                  {
                                    include('Blocs/newGab.php');
                                  }  
                                  
                                ?>

                               <?php
                                //var_dump($userProfile->getMesGabs());
                                  $listGabs=$userProfile->getMesGabs();
                                  include('Blocs/listeGabs.php');
                               ?>
                               
                            
                               
                            
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
	<!-- script references -->
  <?php 
    include ('Blocs/javaScript.php');

  ?>
	</body>
</html>