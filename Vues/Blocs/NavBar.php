<!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="index.php?page=home" class="navbar-brand logo">G</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left" method="GET" action="index.php?page=searchProfile">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" id="page" name="page" value="searchProfile" hidden />
                          <input type="text" class="form-control" placeholder="Search" name="recherche" id="recherche">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                       <li class="dropdown">
                        
                        <a href="index.php?page=myProfile"><i class="glyphicon glyphicon-user"></i> Profile</a>
<!--                         <a href="index.php?page=myProfile" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Profile</a>
 -->                        <!-- <ul class="dropdown-menu">
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                          <li><a href="">More</a></li>
                        </ul> -->
                      </li>
                      <li>
                        <a href="index.php?page=home"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
                      <li>
                        <a href="index.php?page=disconnect"><span class="badge">Disconnect</span></a>
                      </li>
                    <!-- </ul>
                    <ul class="nav navbar-nav navbar-right"> -->
                     
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->

                <!--post modal-->
                <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      Post a Gab
                      </div>
                      <div class="modal-body">
                          <form class="form center-block">
                            <div class="form-group">
                              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?" id="newGab2" maxlength="255"></textarea>
                            </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <div>
                          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" onclick="newGabb2()">Post</button>
                            <ul class="pull-left list-inline">
                              <!-- <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                              <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                              <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li> -->
                            </ul>
                      </div>  
                      </div>
                  </div>
                  </div>
                </div>