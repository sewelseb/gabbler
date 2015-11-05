<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gabbler</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Fonts -->
    <link href="Vues/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="Vues/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="Vues/css/styleAccueil.css" rel="stylesheet">
	<link href="Vues/color/default.css" rel="stylesheet">
	<!-- <link href="Vues/css/styles.css" rel="stylesheet"> -->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <h1>Gabbler</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="#intro">Home</a></li>
			        <li><a href="#register">Register</a></li>
			        <li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
			       <!--  <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Example menu</a></li>
			            <li><a href="#">Example menu</a></li>
			            <li><a href="#">Example menu</a></li>
			          </ul>
			        </li> -->
			      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
		<form action="index.php?page=loginProcess" method="POST">
			<div class="slogan">
				
						<div class="row col-lg-12 col-lg-offset-5">
							<div class="form-group col-lg-2 ">
								 <div  class="input-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                                <input id="login-username" type="text" class="form-control" name="identifiant" value="" placeholder="login">                                        
	                            </div>
							</div>
							
						</div>
						<div class="row col-lg-12 col-lg-offset-5">
							<div class="form-group col-lg-2 ">
								<div  class="input-group">
		                               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                <input id="login-username" type="password" class="form-control" name="password" value="" placeholder="password">                                        
	                            </div>
	                        </div>
						</div>
				
			</div>
			<div class="page-scroll">
				<button href="#register" class="btn btn-circle" type="submit">
					<i class="fa fa-angle-double-right animated" ></i>
				</button>
			</div>
		</form>
    </section>
	<!-- /Section: intro -->

	<!-- Section: register -->
    <section id="register" class="home-section text-center">
		
		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Register</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
        	<div class="wow fadeInLeft" data-wow-delay="0.2s">
	        	<form action="index.php?page=registerProcess" method="POST">
						<div class="slogan">
							
							<div class="row col-lg-12 col-lg-offset-5">
								<div class="form-group col-lg-2 ">
									 <div  class="input-group">
				                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				                        <input type="text" class="form-control" name="identifiant" value="" placeholder="login">                                        
				                    </div>
								</div>
								
							</div>
							<div class="row col-lg-12 col-lg-offset-5">
								<div class="form-group col-lg-2 ">
									 <div  class="input-group">
				                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				                        <input type="text" class="form-control" name="mail" value="" placeholder="example@hotmail.com">                                        
				                    </div>
								</div>
								
							</div>
							<div class="row col-lg-12 col-lg-offset-5">
								<div class="form-group col-lg-2 ">
									<div  class="input-group">
				                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				                        <input id="login-username" type="password" class="form-control" name="password" value="" placeholder="password">                                        
				                    </div>
				                </div>
							</div>
							<div class="row col-lg-12 col-lg-offset-5">
								<div class="form-group col-lg-2 ">
									<div  class="input-group">
				                           <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				                        <input id="login-username" type="password" class="form-control" name="passwordVerif" value="" placeholder="password">                                        
				                    </div>
				                </div>
							</div>
						
						</div>
						<div class="page-scroll btn-group-lg" >
							<button  class="btn " type="submit" style="background-color:#ffffff;">
								Submit <i class="fa fa-angle-double-right animated" style="color:#666666;"></i>
							</button>
							<H6>&nbsp;</H6>
						</div>
					
					</form>
				</div>
        	</div>		
		</div>
	</section>
	<!-- /Section: regiter -->
	

	<!-- Section: about -->
    <section id="about" class="home-section text-center ">
	<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>About us</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Nicolas Müller</h5>
                        <p class="subtitle">Deloper</p>
                        <div class="avatar"><img src="Vues/img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Louis de Passemar</h5>
                        <p class="subtitle">Sell Manager</p>
                        <div class="avatar"><img src="Vues/img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Salim Said</h5>
                        <p class="subtitle">jQuery Ninja</p>
                        <div class="avatar"><img src="Vues/img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Sébastien Boulanger</h5>
                        <p class="subtitle">ASP.NET dev</p>
                        <div class="avatar"><img src="Vues/img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
           
       		<div>
          		<H6>&nbsp;</H6>
            </div>
           	
            <div class="col-xs-6 col-sm-3 col-md-3">
            </div>

            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Sébastien de Beauffort</h5>
                        <p class="subtitle">Bootstrap dev</p>
                        <div class="avatar"><img src="Vues/img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1.4s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Benoit Garcia</h5>
                        <p class="subtitle">Sys admin</p>
                        <div class="avatar"><img src="Vues/img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>

                    </div>
                </div>
				</div>
            </div>
        </div>		
		</div>	
		
	</section>
	<!-- /Section: about -->
	

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Get in touch</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">

		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    <div class="row">
        <div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
		
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Main Office</h5>
				
				<address>
				  <strong>Gabbler</strong><br>
				  rue Ducale, 29<br>
				  Bruxelles, 1000<br>
				  <abbr title="Phone">P:</abbr> +32 (0)470/35.74.35
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">info@gabbler.com</a>
				</address>	
				<address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <!-- <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li> -->
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>	
				</address>					
			
			</div>	
		</div>
    </div>	

		</div>
	</section>
	<!-- /Section: contact -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy;SUPINFO B3 2015 - End of year project.</p>
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="Vues/js/jquery.min.js"></script>
    <script src="Vues/js/bootstrap.min.js"></script>
    <script src="Vues/js/jquery.easing.min.js"></script>	
	<script src="Vues/js/jquery.scrollTo.js"></script>
	<script src="Vues/js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="Vues/js/custom.js"></script>

</body>

</html>
