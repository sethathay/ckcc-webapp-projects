<?php
	session_start();
	if (!isset($_SESSION['user'])) {
	    $mention = "NO";
	}
	$mention = "YES";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final - Web App Development</title>
        <meta charset="UTF-8"/>
        <link rel="shortcut icon" href="img/logo.gif"/>
        <meta name="keywords" content="University USA, USA University"/>
        <meta name="description" content="Main of Education USA"/>
        <meta name="author" content="Developer Cambodian"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.min.css"/>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var user = "<?php echo $mention ?>";
                if (user == "NO") {
                    $('#Sign').text('Sign In');
                } else {
                    var userbar = "";
                    userbar += "<li><a href='dashboard/index.php'>Welcome : ";
                    userbar += "<?php echo $_SESSION['user'] ?>";
                    userbar += "</a></li>";
                    $("#account").after(userbar);
                    $("#Sign").text('Sign Out');
                    $("#signout").attr('href', 'checklogout.php');
                }
            });
        </script>
    </head>
    <body>
        <div class="container-fluid mab-bg-image">
            <div class="container">
                <div class="row" style="margin-bottom:10px;">
                    <div class="col-md-2 col-sm-4 col-xs-4">
                        <img src="img/Logo.jpg" class="img-responsive" />
                    </div>
                    <div class="col-md-10 col-sm-8 col-xs-8">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" id="mab-float-left" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Academic</a></li>
                                        <li><a href="#">Blogs</a></li>
                                        <li id="account"><a href="#">Gallery</a></li>
                                        <li><a id='signout' href="sign.php"><span class="glyphicon glyphicon-user"></span> <span id='Sign'>Sign In</span></a></li>                 
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                    <h1 class="text-center mab-padding-80">Scholarship from Inha University</h1>
                                </div>
                                <div class="item">
                                    <h1 class="text-center mab-padding-80">Scholarship of Gradute School Korean Unversity</h1>
                                </div>
                                <div class="item">
                                    <h1 class="text-center mab-padding-80">EMMA 2014 2nd Cohort</h1>
                                </div>
                                <div class="item">
                                    <h1 class="text-center mab-padding-80">This Swedish Guest Scholarships for Postdoctoral Research</h1>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mab-border-top-bottom">
                    <div class="col-md-4">
                        <h2 class="mab-toolbar mab-blue">Blog Speed</h2>
                        <div class="media bg-color-white">
                            <div class="media-left">
                                <a href="#">
                                    <img src="img/director.jpg" class="mab-picture" />
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="mab-color-blue">Dr. STEVE Job</h4>
                                <p>First Screatary and Concule of the philippine Embassy</p>
                            </div><br/>
                            <div class="media-left">
                                <a href="#">
                                    <img src="img/sennoir.jpg" class="mab-picture" />
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="mab-color-blue">BEN LeangHENG</h4>
                                <p>She successfully graduted from Inha University. Republic Of Korean.</p>
                            </div>
                            <div class="media">
                                <h4 class="mab-color-blue">See more from the Blog</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="mab-toolbar mab-blue">News Feed</h2>
                        <div class="media bg-color-white">
                            <?php
	                            $con = new mysqli('localhost', 'root', '', 'final');
	                            if ($con->connect_error) {
	                                echo "No feed is updated!";
	                            }
	                            $showNewsFeed = "SELECT * FROM tblnewsfeed order by created desc limit 4";
	                            $result = $con->query($showNewsFeed);
	                            if ($result->num_rows > 0) {
	                                while ($row = $result->fetch_assoc()) {
	                                    echo "<h4 class='mab-color-blue'>" 
	                                    . $row['title'] . "</h4><p>" . $row['description'] 
	                                    . "</p><p>" . $row['created'] . "</p>";
	                                }
	                            } else {
	                                echo "No data<br/>";
	                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2 class="mab-toolbar mab-blue">News Letters</h2>
                        <div class="media bg-color-white">
                            <div class="media-body">
                                <h3 class="mab-color-blue">Subscribe to the University</h3>
                                <p>Subscribe to get weekly University's Officail</p>
                                <p>Newspapers, Give us your email.</p>
                            </div>
                            <div class="form-group">
                                <form>
                                    <input class="form-control" type="email" name="email" placeholder="Email address*"required/>
                                    <input class="mab-btn-send mab-btn-default mab-btn-pos-center" type="submit" value="SEND"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contents of web -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 mab-text-center mab-text-blue">
                                <h2>Study at university , <span class="mab-text-upper">We care and think about your future.</span></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h2>Welcome</h2>
                                        <p class="text-justify">
                                            University was established to accommodate the needs of its studentsin 
                                            preparation for their successful future career. We take special 
                                            pride in giving assurance in providing quality education using inter 
                                            nationalstandards. Our university has a library with discussion rooms, 
                                            computer laboratories,a student louge, spacious parking lot, recreational 
                                            center, comfortableclassrooms equipped with up to date facilities like computer and LCD projector, 
                                            equipped with an internet facility, where you can access the web while you are at your canteen
                                            or anywhere in the compus for your enjoyment, learing and socialization. Our commitment
                                            lies in becoming "the center for development of new ideas 
                                            decision-making and practice for the greater good of humanity" and the bright that leads you
                                            to a better quality of education, life, and standard of living.
                                        </p>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                <img src="img/01_academic.png" class="img-responsive">
                                                <h4 class="mab-color-blue">Student Life</h4>
                                                <p class="">
                                                    Foregin student who are interested in studying in Cambodia should first
                                                    approach their national govement.
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                <img src="img/02_research.png" class="img-responsive">
                                                <h4 class="mab-color-blue">Research</h4>
                                                <p>
                                                    Title of papers written by our facility memmber, and presented in an
                                                    international peridical, to find out more about it.
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                <img src="img/03_stulife.png" class="img-responsive">
                                                <h4 class="mab-color-blue">Academic</h4>
                                                <p>
                                                    The main objective of department of University Engineering is to train
                                                    students to become competent.
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-sm-6 col-xs-6">
                                                <img src="img/04_libraies.png" class="img-responsive">
                                                <h4 class="mab-color-blue">Libraries</h4>
                                                <p class="">
                                                    "Truth" the school's motto, indicates we as a research university endeavor
                                                    to contribute to improving the national as well as all human sociaty.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="mab-color-blue text-uppercase">
                                                    more information <span class="glyphicon glyphicon-chevron-right"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Notce Borad</h2>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img/Q.png" class="mab-picture"/>
                                    </div>
                                    <div class="media-body">
                                        <p>
                                            New Intake of Master's Program in Computer Science Hold a certified
                                            Bachelor's degree in Mathematics or relevant from a recognized 
                                            University.
                                        </p>
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            By: Admin
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img/Q.png" class="mab-picture"/>
                                    </div>
                                    <div class="media-body">
                                        <p>
                                            New Intake of Master's Program in IT Engineering. Pass the
                                            Entrance Examination which will be organzied by RUPP.
                                        </p>
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            By: Admin
                                        </h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <img src="img/Q.png" class="mab-picture"/>
                                    </div>
                                    <div class="media-body">
                                        <p>
                                            New Result of National Exam will release in 09/ 09/ 2015, Have an
                                            English proficiency of Intermediate level or higher.
                                        </p>
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            By: Admin
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h2 class="mab-margin-bottom">Top News</h2>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <h1 class="mab-no-margin-padding">26</h1>
                                        <p>08/2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            LOUST+
                                        </h4>
                                        <p>
                                            LOUST+ is an Erasmus Mundus Action 2 project (with finacial
                                            support granted by the European Commission) that grants sholars.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <h1 class="mab-no-margin-padding">24</h1>
                                        <p>07/2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            EMMA 2014 2nd Cohort
                                        </h4>
                                        <p>
                                            The second application process will open from Wednesday 1st
                                            October 2015 to Saturday 15th November 2015.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="media">
                                    <div class="media-left">
                                        <h1 class="mab-no-margin-padding">20</h1>
                                        <p>05/2015</p>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="mab-color-blue media-heading mab-no-margin-padding">
                                            This Swedish Guest Scholarships for Postdoctoral Research
                                        </h4>
                                        <p>
                                            The Swedish Institute announces Guest Scholarships for postdoctoral
                                            research for researchers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- last of contents -->
                <div class="row mab-border-top">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h1>Addresee</h1>
                        <p class="text-justify">
                            If you would like to find out any further information about the Royal
                            University of Phnom Penh. or become involved any of our programs please 
                            contacts us.
                            If you would like to find out any further information about the Royal
                            University of Phnom Penh. or become involved any of our programs please 
                            contacts us.
                        </p>
                        <p class="text-justify">
                            If you would like to find out any further information about the Royal
                            University of Phnom Penh. or become involved any of our programs please 
                            contacts us.
                        </p>
                        <p>
                            The University Russian Federation Boulevard.<br/>
                            Tuk kor, Phnom Penh, Combodia.<br/>
                            Tel : +885 97 60 31 169<br/>
                            Email : <a href="#">mabhelitc@gmail.com</a>
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mab-lineheight">
                        <h1>Page</h1>
                        <span class="glyphicon glyphicon-arrow-right"> Home</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> About</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Programs</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Blogs</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Gallery</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Contacts</span><br/>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12 mab-lineheight">
                        <h1>Quick</h1>
                        <span class="glyphicon glyphicon-arrow-right"> History</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Department</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Service</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Guidance</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Tearm</span><br/>
                        <span class="glyphicon glyphicon-arrow-right"> Contacts</span><br/>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="container-fluid mab-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-ms-12 col-xs-12">
                        <h5>
                            Copyright &copy; 2015 University. All right reserved | Design by University
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>