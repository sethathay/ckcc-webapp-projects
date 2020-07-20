<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>CKCC Final-Term: University</title>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/newcss.css" rel="stylesheet" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="University Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>
</head>
<body>
<!-- banner -->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <script>
  $(document).ready(function () {
    $('.btn-login').click(function(){
       var username = $("#username").val();
       var password = $("#pass").val();
       
       if(username == ""){
           $("#username").parent().addClass('has-error');
           $("#usernamemessage").text("This field is required.");
           $("#usernamemessage").css("color","red");
           $("#username").focus();
       }else if(password == ""){
           $("#username").parent().removeClass('has-error');
           $("#usernamemessage").text("");
           $("#usernamemessage").css("color","black");
           $("#pass").parent().addClass('has-error');
           $("#userpassword").text("This field is required.");
           $("#userpassword").css("color","red");
           $("#pass").focus();
       }
       else{
           $("#pass").parent().removeClass('has-error');
           $("#userpassword").text("");
           $("#userpassword").css("color","black");
           var data ={ "username" : username,
                       "password": password};
            var jsondata = JSON.stringify(data);
           $.post('dashboard/lib/auth.php',{para: jsondata},function(data){
               if(data == 1){
                   window.location.href ="dashboard/index.php"; 
               }else{
                   $("#username").parent().removeClass('has-error');
                   $("#usernamemessage").text("");
                   $("#pass").parent().removeClass('has-error');
                   $("#userpassword").text("");
                   $("#userpassword").text("Username and password is incorrect");
                   $("#userpassword").css("color","red");
                   $("#username").focus();
               }
           });
       }
    });
});
  </script>
<div class="banner">	  
	 <div class="header">
			 <div class="logo">
				 <a href="index.html"><img src="images/logo.jpg" alt=""/></a>
			 </div>
			 <div class="top-menu">
                             <span class="menu" style="float:left;margin-right: 5px;"></span>
                                 <ul class="navig" style="float:left;">
					 <li class="active"><a href="index.html">Home</a></li>
					 <li><a href="program.html">Academic</a></li>
					 <li><a href="blog.html">Blog</a></li>
					 <li><a href="gallery.html">Gallery</a></li>
                                         <li>
                                            <?php if(!isset($_SESSION["username"])){ ?>
                                            <a class="signin" style="color:blue" href="login.php#userlogin"><span style="color:black;" class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Sign In</a>
                                             <?php }else{?>
                                            <?php echo "<span>Welcome: </span>". $_SESSION["username"] ?>&nbsp;&nbsp;<a class="signin" style="color:blue" href="index.php?action=logout"><span style="color:black;" class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Sign Out</a>
                                             <?php }?>
                                         </li>
				 </ul>
			 </div>
			  <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$("ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->

			 <div class="clearfix"></div>
	 </div>
        <div class="slideshow">
            <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                      <div class="item active">
                          <div style="padding: 50px 50px;color: white;text-align: justify">
                              <h1 style="text-align: center;">Scholarship of Graduate School Korea University</h1>
                          </div>
                      <div class="carousel-caption">
                        
                      </div>
                    </div>
                    <div class="item">
                      <div style="padding: 50px 50px;color: white;text-align: justify">
                          <h1 style="text-align: center;">The best quality university in Cambodia.</h1>
                      </div>
                      <div class="carousel-caption">
                        
                      </div>
                    </div>
                    <div class="item">
                      <div style="padding: 50px 50px;color: white;text-align: justify">
                          <h1 style="text-align: center;">Academic Achievement Center (Tutoring Service)</h1>
                      </div>
                      <div class="carousel-caption">
                        
                      </div>
                    </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                      <span style="color:white;" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span style="color:#f5f5f5;" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
	  <div class="banner-grids threeblogs">
		  <div class="container">
			 <div class="col-md-4 col-sm-3 banner-grid margin15px">
				 
			 </div>
			 <div class="col-md-4 col-sm-6 banner-grid margin15px">
				 <h3 id="userlogin">Sign in</h3>
				 <div class="banner-grid-sec">
					 <div class="news-grid">
                                             <form  id="formlogin">
                                                <div class="form-group">
                                                    <div class="blg-pic" style="float:none;width:40%;margin:0px auto;">
                                                            <img src="images/login.png" class="img-responsive" alt="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" style="height:45px;margin-bottom: 0px;" class="form-control" name="username" id="username" placeholder="Enter your user name">
                                                    <span id="usernamemessage" style="font-size:13px;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" style="height:45px;" class="form-control" name="pass" id="pass" placeholder="Password">
                                                    <span id="userpassword" style="font-size:13px;"></span>
                                                </div>   
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-login" style="width:100%;">Sign in</button>
                                                </div>
                                             </form>
					 </div>
				 </div>
			 </div>
			 <div class="col-md-4 col-sm-3 banner-grid margin15px">
				 
			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="welcome">
	 <div class="container">
		 <h2>Study at University, WE CARE & THINK ABOUT YOUR FUTURE</h2>
		 <div class="welcm_sec">
			 <div class="col-md-9 col-sm-12 col-xs-12 campus padding15px">
				 <div class="campus_head">
					 <h3>Welcome</h3>
                                         <p style="text-align: justify">
                                            University was established to accommodate the needs of its students in preparation for their successful future career. We take special pride in giving assurance in providing quality education using international standards. Our university has a library with discussion rooms, 
                                            computer laboratories, a student lounge, spacious parking lot, recreational center, 
                                            comfortable classrooms equipped with the up to date facilities like computers and 
                                            LCD projectors, equipped with an Internet facility, where you can access the web 
                                            while you are at our canteen or anywhere in the campus for your enjoyment, learning 
                                            and socialization. Our commitment lies in becoming "the center for development of 
                                            new ideas, decision-making and practice for the greater good of humanity" and the 
                                            bridge that leads you to a better quality of education, life, and standard of living.
                                         </p>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12 wel_grid">
					 <img src="images/w1.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Student Life</a></h5>
                                         <p>
                                             Foreign students who are interested in studying in Cambodia should first approach their national government.
                                         </p>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12 wel_grid">
					 <img src="images/w3.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Research</a></h5>
                                         <p>
                                             Title of a paper written by our faculty member, and presented in an international periodical, to find out more about it.
                                         </p>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12 wel_grid">
					 <img src="images/w2.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Academic</a></h5>
                                         <p>
                                             The main objective of the department of Mechanical Engineering is to train students to become competent.
                                         </p>
				 </div>
				 <div class="col-md-3 col-sm-6 col-xs-12 wel_grid">
					 <img src="images/w4.jpg" class="img-responsive" alt=""/>
					 <h5><a href="#">Libraries</a></h5>
					 <p>“Truth” the school’s motto, indicates we as a research university endeavor to contribute to improving the nation as well as all human society</p>
				 </div>
				 <div class="clearfix"></div>
				 <div class="more_info">
						 <a href="blog.html">More Info....</a>
				 </div>
			 </div>
			 <div class="col-md-3 col-sm-12 testimonal">
					<h3>Notice Board</h3>
					<div class="testimnl-grid">
						 <a href="#"><p>New Intake of Master's Program in Computer Science 
                                                         Hold a certified Bachelor’s degree in Mathematics or relevant from a recognized university,</p></a>
						 <h5>By: Admin</h5>
					</div>
					<div class="testimnl-grid">
						 <a href="#"><p>New Intake of Master's Program in IT Engineering. Pass the Entrance Examination which will be organized by RUPP</p></a>
						 <h5>By: Admin</h5>
					</div>
                                        <div class="testimnl-grid">
						 <a href="#"><p>New Result of National Exam will release in 09.09.2015. Have an English proficiency of intermediate level or higher</p></a>
						 <h5>By: Admin</h5>
					</div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="news">
	 <div class="container">
		 <h3>Top News</h3>
		  <div class="event-grids">			
		     <div class="col-md-4 event-grid">
				 <div class="date">
				     <h4>26</h4>
					 <span>08/2015</span>
				 </div>				 
			     <div class="event-info">
					  <h5><a href="#">LOTUS+</a></h5>
						<p>LOTUS+ is an Erasmus Mundus Action 2 project (with financial support granted by the European Commission) that grants scholars </p>					
				 </div>
				 <div class="clearfix"></div>				 			 
			 </div>
			 <div class="col-md-4 event-grid">
				 <div class="date">
				     <h4>24</h4>
					 <span>06/2015</span>
				 </div>				 
			     <div class="event-info">
					  <h5><a href="#">EMMA 2014 2nd Cohort </a></h5>
						<p>The second application process will open from Wednesday 1st October 2015 to Saturday 15th November 2015.</p>					
				 </div>
				 <div class="clearfix"></div>				 			 
			 </div>
			 <div class="col-md-4 event-grid">
				 <div class="date">
				     <h4>20</h4>
					 <span>04/2015</span>
				 </div>				 
			     <div class="event-info">
					  <h5><a href="#">The Swedish Guest Scholarships for Postdoctoral Research</a></h5>
						<p>The Swedish Institute announces Guest Scholarships for postdoctoral research for researchers.</p>					
				 </div>
				 <div class="clearfix"></div>				 			 
			 </div>
			 <div class="clearfix"></div>	
		 </div>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
		 <div class="ftr-sec">
			 <div class="col-md-4 col-sm-4 col-xs-12 ftr-grid">
				 <h3>Address</h3>
				 <p>If you would like to find out any further information about the Royal University of Phnom Penh, or become involved in any of our programs please contact us</p>
                                 <p>
                                     <span>The University</span><br/>
                                     <span>Russian Federation Boulevard,</span><br/>
                                     <span>Toul Kork, Phnom Penh, Cambodia.</span><br/>
                                     <span><b>Tel:</b> 855-23-883-640</span><br/>
                                     <span><b>Fax:</b> 855-23-880-116</span><br/>
                                     <span><b>Email:</b> info@university.com</span>
                                 </p>
			 </div>
			 <div class="col-md-4 col-sm-4 col-xs-12 ftr-grid2">
				 <h3>Pages</h3>
				 <ul>
					 <li><a href="index.html"><span></span>Home</a></li>
					 <li><a href="about.html"><span></span>About</a></li>
					 <li><a href="program.html"><span></span>Programs</a></li>
					 <li><a href="blog.html"><span></span>Blog</a></li>	
					 <li><a href="gallery.html"><span></span>Gallery</a></li>
					 <li><a href="contact.html"><span></span>Contact</a></li>
				 </ul>
			 </div>
			 <div class="col-md-4 col-sm-4 col-xs-12 ftr-grid3">
				 <h3>Quick links</h3>
				 <ul>
					 <li><a href="about.html"><span></span>History</a></li>
					 <li><a href="about.html"><span></span>Departments</a></li>
					 <li><a href="gallery.html"><span></span>Services</a></li>
					 <li><a href="blog.html"><span></span>Guidancs</a></li>	
					 <li><a href="about.html"><span></span>Team</a></li>
					 <li><a href="contact.html"><span></span>Contact</a></li>
				 </ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="copywrite">
	 <div class="container">
		 <p>Copyright © 2015 University. All rights reserved | Design by University</p>
	 </div>
</div>
<!---->
</body>
</html>