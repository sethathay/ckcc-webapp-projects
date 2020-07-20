<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>The University - Administrator Pages</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <?php
            require ("lib/includefiles.php");
            $conn = openconnection();
            session_start();
            if(isset($_POST["username"])){
                $_SESSION["username"] = $_POST["username"];
            }
            if(isset($_GET["action"]) && $_GET["action"]=="logout"){
                session_destroy();
                header("Location: ../index.php");
            }
            if(!isset($_SESSION["username"])){
                header("Location: ../index.php");
            }
          ?>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">The University</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" target="_blank" href="../index.php">View site</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="index.php?action=logout">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="index.php">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul style="margin-right:10px !important; margin-top: 0px !important;margin-bottom:20px !important;" class="nav nav-list bs-docs-sidenav">
                        <li class="active">
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="newsfeed.php"><i class="icon-chevron-right"></i>News Feed</a>
                        </li>
                        <li>
                            <a href="studentlist.php"><span class="badge badge-info pull-right">
                                <?php
                                            $result = totalrows("tblstudents",$conn);
                                            if(isset($result)){
                                                while($row = $result->fetch_row()) {
                                                    echo $row[0];
                                                }
                                            }
                                        ?>
                                </span>Students</a>
                        </li>
                    </ul>
                </div>
                <div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
                                            <i class="icon-chevron-left hide-sidebar" style="display:none"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    You are in: 
                                            <li class="active">Dashboard</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Top Students</div>
                                    <div class="pull-right"><span class="badge badge-warning">
                                            <a href="studentlist.php" style="text-decoration: none;color:white;">View More</a>
                                        </span>
                                    </div>
                                    <div class="pull-right"><span class="badge badge-info">
                                        Total :
                                        <?php
                                            $totalrow = totalrows("tblstudents",$conn);
                                            if(isset($totalrow)){
                                                while($row = $totalrow->fetch_row()) {
                                                    echo $row[0];
                                                }
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Class</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $lists = selectdata("tblstudents",$conn," order by cast(class as unsigned) desc, cast(rank as unsigned) asc limit 4");
                                                if($lists->num_rows>0){
                                                    $j = 1;
                                                    while($row = $lists->fetch_row()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $j . "</td>";
                                                        echo "<td>" . $row[2] . " " . $row[3] . "</td>";
                                                        $gen = $row[4] == 1? "Male" : "Female";
                                                        echo "<td>" . $gen . "</td>";
                                                        echo "<td>" . $row[6] . "</td>";
                                                        echo "<td>" . $row[7] . "</td>";
                                                        echo "</tr>";
                                                        $j++;
                                                    }
                                                }else{
                                                    echo "<tr>";
                                                    echo "<td colspan='5'><i>No data</i></td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Active News Feed</div>
                                    <div class="pull-right">
                                        <span class="badge badge-warning">
                                            <a href="newsfeed.php" style="text-decoration: none;color:white;">View More</a>
                                        </span>
                                    </div>
                                    <div class="pull-right">
                                        <span class="badge badge-info">
                                            Total : 
                                            <?php
                                                $result = totalrows("tblnewsfeed",$conn);
                                                if(isset($result)){
                                                    while($row = $result->fetch_row()) {
                                                        echo $row[0];
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $list = selectdata("tblnewsfeed",$conn," order by created desc limit 4");
                                                if($list->num_rows>0){
                                                    $j = 1;
                                                    while($row = $list->fetch_row()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $j . "</td>";
                                                        echo "<td>" . $row[1] . "</td>";
                                                        echo "<td>" . $row[2] . "</td>";                                                        
                                                        echo "</tr>";
                                                        $j++;
                                                    }
                                                }else{
                                                    echo "<tr>";
                                                    echo "<td colspan='3'><i>No data</i></td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <footer>
                <p>&copy; University 2015</p>
            </footer>
        </div>
        <?php closeconnection($conn);?>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
    </body>

</html>