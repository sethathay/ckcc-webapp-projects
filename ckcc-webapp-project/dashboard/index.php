<?php
    session_start();
    if(!isset($_SESSION['user'])){
        $url = "Location: ../index.php";
        header($url);
        exit();
    }
?>
<html>
    <head>
        <title>The University - Administrator</title>
        <link rel="shortcut icon" href="../img/logo.gif"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/dashboard.css"/>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../jquery/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>      
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" id="mab-float-left" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php" target="_blank">The University</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Dashboard</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="dropdown">
                            <button class="btn btn-default mab-button-dropdown" class="dropdown-toggle" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php echo $_SESSION['user']?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="../index.php" target="_blank">View Site</a></li>
                                <li><a href="../checklogout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>        
        <div class="container-fluid" style="margin-top:65px;">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <span class="badge" style="background-color:#337ab7;color:white;"><span class="glyphicon glyphicon-chevron-right"></span></span>
                            <a href="index.php" style="text-decoration:none;color:white;">Dashbords</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge" style="background-color:white;color:black;"><span class="glyphicon glyphicon-chevron-right"></span></span>
                            <a href="newsfeed.php" style="text-decoration:none;color:black;">News Feed</a>
                        </li>
                        <li class="list-group-item">
                            <span class="badge" style="background-color:#337ab7;color:white;">
                                <?php
                                    $connect = new mysqli('localhost', 'root', '', 'final');
                                    if($connect->connect_error){
                                        echo "Connection error : " .$connect->connect_error;
                                    }
                                    $showDataNewsFeed = "SELECT * FROM tblstudents";
                                    $result = $connect->query($showDataNewsFeed);
                                    echo $result->num_rows;
                                ?>
                            </span></span>
                            <a href="student.php" style="text-decoration:none;color:black;">Students</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-9 col-ms-9"> 
                        <div class="row">
                        <div class="col-md-12">
                            <ol class="breadcrumb">
                                You are in :
                                <li><a href="index.php">Dashboard</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <ul class="list-group mab-panel-list-group">
                                        <li class="list-group-item mab-panel-list-group-item">
                                            <span class="badge" style="background-color:rgb(255, 171, 0);color:white;"><a href="student.php" style="text-decoration:none;color:white;"><span>View More</span></a></span>
                                            <span class="badge" style="background-color:#337ab7;color:white;">Total:
                                                <?php
                                                    $connect = new mysqli('localhost', 'root', '', 'final');
                                                    if($connect->connect_error){
                                                        echo "Connection error : " .$connect->connect_error;
                                                    }
                                                    $showDataNewsFeed = "SELECT * FROM tblstudents";
                                                    $result = $connect->query($showDataNewsFeed);
                                                    echo $result->num_rows;
                                                ?>
                                            </span>
                                            Top Students
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-responsive">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Class</th>
                                            <th>Rank</th>
                                        </tr>
                                        <?php
                                            $connect = new mysqli('localhost', 'root', '', 'final');
                                            if($connect->connect_error){
                                                echo "Connection error : " .$connect->connect_error;
                                            }
                                            $showDataNewsFeed = "SELECT * FROM tblstudents where rank < 5 and class = 12 order by rank";
                                            $result = $connect->query($showDataNewsFeed);
                                            if($result->num_rows>0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<tr><td>".$row["id"]. "</td><td>". $row['firstname']. " " 
                                                    . $row["lastname"]. "</td><td>". $row["gender"] . "</td><td>" . $row["class"] 
                                                    . "</td><td>" . $row["rank"] . "</td></tr>";
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-ms-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <ul class="list-group mab-panel-list-group">
                                        <li class="list-group-item mab-panel-list-group-item">
                                            <span class="badge" style="background-color:rgb(255, 171, 0);color:white;"><a href="newsfeed.php" style="text-decoration:none;color:white;">View More</a></span>
                                            <span class="badge" style="background-color:#337ab7;color:white;">Total:
                                                <?php
                                                    $connect = new mysqli('localhost', 'root', '', 'final');
                                                    if($connect->connect_error){
                                                        echo "Connection error : " .$connect->connect_error;
                                                    }
                                                    $showDataNewsFeed = "SELECT * FROM tblnewsfeed";
                                                    $result = $connect->query($showDataNewsFeed);
                                                    echo $result->num_rows;
                                                ?>
                                            </span>
                                            Active News Feed
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-responsive">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                        </tr>
                                        <?php
                                            $connect = new mysqli('localhost', 'root', '', 'final');
                                            if($connect->connect_error){
                                                echo "Connection error : " .$connect->connect_error;
                                            }
                                            $showDataNewsFeed = "SELECT * FROM tblnewsfeed order by created desc limit 4";
                                            $result = $connect->query($showDataNewsFeed);
                                            if($result->num_rows>0){
                                                while($row = $result->fetch_assoc()){
                                                    echo "<tr><td>".$row["id"]. "</td><td>" .$row['title'] . "</td><td>" . $row['description']. "</td></tr>";
                                                }
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <p style="color:#999;">&copy; University 2015</p>
        </div>
    </body>
</html>