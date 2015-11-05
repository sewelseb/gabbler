<?php
  include("Blocs/Header.php");
?>
	<body>
<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">

            <!-- main right col -->
            <div class="column col-sm-12 col-xs-11" id="main">
             <!--   <div class="column col-sm-10 col-xs-11" id="main"> -->
                
                <?php
                   include("Blocs/NavBar.php");
                ?>
              
                <div class="padding">

                    <?php
                      $userProfile=$user;
                      include('Blocs/infoProfil.php');

                    ?>
                           
                            

                           		
                           
                          </div>
                          
                          <!-- main col right -->
                          <div class="col-sm-7">
                               <?php
                                    
                                  include('Blocs/newGab.php');
                                ?>
                                

                                <?php
                                    $listGabs=$listePosts;
                                  include('Blocs/listeGabs.php');
                                ?>
                                
                              
                               
                            
                          
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



	<!-- script references -->
  <?php 
    include ('Blocs/javaScript.php');

  ?>
		
	</body>
</html>