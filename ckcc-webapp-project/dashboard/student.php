<?php
    session_start();
    if(!isset($_SESSION['user'])){
        $url = "Location: ../index.php";
        header($url);
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>The University - Administrator</title>
    <link rel="shortcut icon" href="../img/logo.gif"/>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/students.js"></script>
    <style type="text/css">
        body{
            padding-top: 0px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- start with nav bar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" id="mab-float-left" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">The University</a>
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
    <!-- end of nav bar -->
    <!-- start contents -->
    <div class="container-fluid" style="margin-top:65px;">
        <div class="row">
            <div class="col-md-3 col-ms-3">
                <ul class="list-group"> 
                    <li class="list-group-item">
                        <span class="badge" style="background-color:white;color:black;"><span class="glyphicon glyphicon-chevron-right"></span></span>
                        <a href="index.php" style="color:black;text-decoration:none;">Dashboard</a>
                    </li>
                    <li class="list-group-item">
                        <span class="badge" style="background-color:white;color:black;"><span class="glyphicon glyphicon-chevron-right"></span></span>
                        <a href="newsfeed.php" style="color:black;text-decoration:none;">News Fedd</a>
                    </li>
                    <li class="list-group-item active">
                        <span class="badge" style="background-color:white;color:black;">
                            <?php
                                $connect = new mysqli("localhost", "root", "", "final");
                                if($connect->connect_error){
                                    echo "Connection is failed";
                                }
                                $selectDataStudents = "SELECT * FROM tblstudents";
                                $result = $connect->query($selectDataStudents);
                                echo $result->num_rows;
                            ?>
                        </span>
                        <a href="student.php" style="color:white;text-decoration:none;">Students</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 col-ms-9">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        You are in : 
                        <li><a href="index.php" style="text-decoration:none;">Dashboard</a></li>
                        <li class="active">Students</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <ul class="list-group mab-panel-list-group" style="margin:0px;padding:0px;border:none;">
                                <li class="list-group-item mab-panel-list-group-item" style="margin:0px;padding:0px;border:none;">
                                    <span class="badge" style="background-color:#337ab7;color:white;">Total: 
                                        <?php
                                            $connect = new mysqli("localhost", "root", "", "final");
                                            if($connect->connect_error){
                                                echo "Connection is failed";
                                            }
                                            $selectDataStudents = "SELECT * FROM tblstudents";
                                            $result = $connect->query($selectDataStudents);
                                            echo $result->num_rows;
                                        ?>
                                    </span>
                                    <a href="student.php" style="text-decoration:none;">Top Students</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-info" data-toggle="modal" data-target="#myform" id="show" style="margin-bottom:20px;">Add New</button>
                            <div class="modal fade" id="myform">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="glyphicon glyphicon-remove-circle"></span></button>
                                            <h3 style="margin:0px;padding:0px;">Student Information</h1>
                                        </div>
                                        <div class="modal-body">
                                            <form name="myForm">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">ID Card</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="idcard" />
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">First Name</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="fn"/>
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">Last Name</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="ln"/>
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">Gender</div>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="sex">
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">Address</div>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" name="address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">Class</div>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="clas">
                                                                <option value="9">9</option>
                                                                <option value="10">10</option>
                                                                <option value="11">11</option>
                                                                <option value="12">12</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mab-marginpadding">
                                                        <div class="col-md-3">Rank</div>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" name="rank" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer" style="background-color:#f5f5f5;">
                                            <button class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button class="btn btn-success" id="save">Save</button>
                                            <button class="btn btn-info" id="update">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-responsive" id="tblnewsfeed">
                                <tr>
                                    <th>#</th>
                                    <th>ID Card</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Class</th>
                                    <th>Rank</th>
                                    <th>Ation</th>
                                </tr>
                                <?php
                                    $connect = new mysqli("localhost", "root", "", "final");
                                    if($connect->connect_error){
                                        echo "Connection is failed";
                                    }
                                    $selectDataStudents = "SELECT * FROM tblstudents";
                                    $result = $connect->query($selectDataStudents);
                                    if($result->num_rows>0){
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" .$row['id']. "</td><td>".
                                                    $row['idcard']. "</td><td>".
                                                    $row['firstname']. "</td><td>".
                                                    $row['lastname']. "</td><td>".
                                                    $row['gender']. "</td><td>".
                                                    $row['address']. "</td><td>".
                                                    $row['class']. "</td><td>".
                                                    $row['rank']. "</td><td>".
                                                    "<button class='btn btn-default' data-toggle='modal' data-target='#myform' id='edit'>Edit</button>".
                                                    "<button class='btn btn-default' id='delete'>Delete</button></td></tr>";
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
    <div class="container-fluid">
        <p style="color:#999;">&copy; University 2015</p>
    </div>
</body>
</html>