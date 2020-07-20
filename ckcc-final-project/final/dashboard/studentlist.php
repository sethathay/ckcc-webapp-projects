<?php
    session_start();
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>The University - Administrator Pages</title>
        <script src="bootstrap/js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#newStudent').on('shown', function () {
                    $("#idcard").focus();
                });
                $(".btnsave").click(function(){
                    var id = $("#hideid").val();
                    var idcard = $("#idcard").val();
                    var firstname = $("#firstname").val();
                    var lastname = $("#lastname").val();
                    var gender = $('#gender').val();
                    var address = $("#address").val();
                    var textclass = $("#idclass" ).val();
                    var rank = $("#rank").val();
                    
                    if(idcard == ""){
                        $("#idcard").parent().parent().addClass("error");
                        $("#idcard").focus();
                    }else if(firstname == ""){
                        $("#idcard").parent().parent().removeClass("error");
                        $("#firstname").parent().parent().addClass("error");
                        $("#firstname").focus();
                    }else if (lastname == ""){
                        $("#idcard").parent().parent().removeClass("error");
                        $("#firstname").parent().parent().removeClass("error");
                        $("#lastname").parent().parent().addClass("error");
                        $("#lastname").focus();
                    }else if(address == ""){
                        $("#idcard").parent().parent().removeClass("error");
                        $("#firstname").parent().parent().removeClass("error");
                        $("#lastname").parent().parent().removeClass("error");
                        $("#address").parent().parent().addClass("error");
                        $("#address").focus();
                    }else{
                        $("#address").parent().parent().removeClass("error");
                        var data ={ "id" : id,
                                    "idcard": idcard, 
                                    "firstname": firstname ,
                                    "lastname": lastname,
                                    "gender": gender,
                                    "address" : address,
                                    "classtext":textclass,
                                    "rank":rank};
                        var jsondata = JSON.stringify(data);
                        $.post('lib/studentlist.php',{para: jsondata},function(data,status){
                            if(status == "success"){
                                if($('.btnsave').text() == "Save"){
                                    var html ="";
                                    var gen = gender == 1? "Male" : "Female";
                                    html += "<tr>";
                                    html += "<td>";
                                    html += "1";
                                    html += "</td>";
                                    html += "<td>";
                                    html += idcard;
                                    html += "</td>";
                                    html += "<td>";
                                    html += firstname;
                                    html += "</td>";
                                    html += "<td>";
                                    html += lastname;
                                    html += "</td>";
                                    html += "<td>";
                                    html += gen;
                                    html += "</td>";
                                    html += "<td>";
                                    html += address;
                                    html += "</td>";
                                    html += "<td>";
                                    html += textclass;
                                    html += "</td>";
                                    html += "<td>";
                                    html += rank;
                                    html += "</td>";
                                    html += "<td>";
                                    html += "<span style='display:none'>" + data[0] + "</span>";
                                    html += "<button id='btnedit' class='btn btn-primary btnaction'><i class='icon-pencil icon-white'></i></button>&nbsp;";
                                    html += "<button id='btndelete' class='btn btn-danger btnaction'><i class='icon-trash icon-white'></i></button>";
                                    html += "</td>";
                                    html += "</tr>";
                                    if($(".tbllist").find("tr").last().find("td").eq(0).text() == "No data"){
                                        $(".tbllist").find("tr").last().remove();
                                    }
                                    $(".tbllist").find("tr").first().after(html);
                                    $(".tbllist").find("tr").first().next().addClass('selectedrow');
                                    var tr_length = $(".tbllist tr").length;
                                    for(var i =1;i < tr_length;i++){
                                        $(".tbllist").find('tr').eq(i).find('td').eq(0).text(i);
                                    }
                                    $(".badge-count").text(data[1]);
                                    cleardata();
                                    $('#newStudent').modal('hide');
                                }else{
                                    var updaterow = $(".tbllist").find("tr.selectedrow");
                                    updaterow.children().eq(1).text(idcard);
                                    updaterow.children().eq(2).text(firstname);
                                    updaterow.children().eq(3).text(lastname);
                                    var gen = gender == 1? "Male" : "Female";
                                    updaterow.children().eq(4).text(gen);
                                    updaterow.children().eq(5).text(address);
                                    updaterow.children().eq(6).text(textclass);
                                    updaterow.children().eq(7).text(rank);
                                    $('#newStudent').modal('hide');
                                }
                            }
                        });
                    }
                });
                $('#newStudent').on('hidden', function () {
                    cleardata();
                });
                function cleardata(){
                    $("#idcard").val("");
                    $("#firstname").val("");
                    $("#lastname").val("");
                    $("#address").val("");
                    $("#rank").val("");
                    $("#hideid").val("");
                    $("#idcard").focus();
                    $('.btnsave').text("Save");
                    setTimeout(function(){$('.tbllist').find('tr').removeClass('selectedrow')},300);
                }
                $(document).on('click','#btnedit',function(){
                    $("#newStudent").modal("show");
                    $('.tbllist').find('tr').removeClass('selectedrow');
                    var editrow = $(this).parent().parent();
                    $("#hideid").val(editrow.children().eq(8).find('span').text());
                    $("#idcard").val(editrow.children().eq(1).text());
                    $("#firstname").val(editrow.children().eq(2).text());
                    $("#lastname").val(editrow.children().eq(3).text());
                    var gen = editrow.children().eq(4).text() == "Male"? 1 : 2;
                    $("#gender").val(gen);
                    $("#address").val(editrow.children().eq(5).text());
                    $("#idclass").val(editrow.children().eq(6).text());
                    $("#rank").val(editrow.children().eq(7).text());
                    editrow.addClass('selectedrow');
                    $('.btnsave').text("Update");
                });
                $(document).on('click','#btndelete',function(){
                    $('.tbllist').find('tr').removeClass('selectedrow');
                    var editrow = $(this).parent().parent();
                    editrow.addClass('selectedrow');
                    var r = confirm("Are you sure you want to delete this student?");
                    if(r == true){
                        var id = editrow.children().eq(8).find('span').text();
                        $.post('lib/studentlist.php',{delid: id },function(data,status){
                            if(status == "success"){
                                var tr_length = editrow.nextAll().length;
                                var current = editrow.find('td').eq(0).text();
                                for(var i =0;i < tr_length;i++){
                                    editrow.nextAll().eq(i).find('td').eq(0).text(parseInt(current) + i);
                                }
                                editrow.remove();
                                //minus count record
                                var count_record = $(".badge-count").text();
                                $(".badge-count").text(parseInt(count_record)-1);
                            }
                        });
                    }
                    else{
                        $('.tbllist').find('tr').removeClass('selectedrow');
                    }
                });
            });
        </script>
    </head>
    
    <body>
        <?php
            require ("lib/includefiles.php");
            $conn = openconnection();
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
                        <li>
                            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="newsfeed.php"><i class="icon-chevron-right"></i>News Feed</a>
                        </li>
                        <li class="active">
                            <a href="studentlist.php">
                                <span class="badge badge-info pull-right badge-count">
                                <?php
                                            $result = totalrows("tblstudents",$conn);
                                            if(isset($result)){
                                                while($row = $result->fetch_row()) {
                                                    echo $row[0];
                                                }
                                            }
                                        ?>    
                                </span>
                                Students</a>
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
                                            <li>
                                                <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                                            </li>
                                            /
                                            <li class="active">Students</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Students</div>
                                    <div class="pull-right">
                                        Total : <span class="badge badge-info badge-count">
                                        <?php
                                            $result = totalrows("tblstudents",$conn);
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
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                         <a href="#" id="btnaddnew">
                                             <button class="btn btn-success btnaction" data-backdrop="static" data-toggle="modal" data-target="#newStudent">
                                                 <i class="icon-plus icon-white"></i>
                                                 Add New
                                             </button>
                                         </a>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="newStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">New Student</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal">
                                                        <div class="control-group">
                                                            <label class="control-label" for="idcard">ID Card</label>
                                                            <div class="controls">
                                                              <input class="input-xlarge focused inputval" id="idcard" type="text" placeholder="ID Card">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="firstname">First Name</label>
                                                            <div class="controls">
                                                              <input class="input-xlarge focused inputval" id="firstname" type="text" placeholder="First Name">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="lastname">Last Name</label>
                                                            <div class="controls">
                                                              <input class="input-xlarge focused inputval" id="lastname" type="text" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="gender">Gender</label>
                                                            <div class="controls">
                                                                <select style="width:95%" id="gender">
                                                                    <option value="1">Male</option>
                                                                    <option value="2">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="address">Address</label>
                                                            <div class="controls">
                                                                <textarea class="input-xlarge focused inputval" id="address" row="3" placeholder="Address"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="idclass">Class</label>
                                                            <div class="controls">
                                                                <select style="width:95%" id="idclass">
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="rank">Rank</label>
                                                            <div class="controls">
                                                              <input class="input-xlarge focused inputval" id="rank" type="text" placeholder="Rank">
                                                            </div>
                                                        </div>
                                                    </form> 
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="hidden" id="hideid"/>
                                                    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
                                                    <a href="#" class="btn btn-primary btnsave">Save</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <table class="table tbllist" style="margin-top:10px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Card</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Class</th>
                                                <th>Rank</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $list = selectdata("tblstudents",$conn," order by id desc");
                                                if($list->num_rows>0){
                                                    $j = 1;
                                                    while($row = $list->fetch_row()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $j . "</td>";
                                                        echo "<td>" . $row[1] . "</td>";
                                                        echo "<td>" . $row[2] . "</td>";
                                                        echo "<td>" . $row[3] . "</td>";
                                                        $gen = $row[4] == 1? "Male" : "Female";
                                                        echo "<td>" . $gen . "</td>";
                                                        echo "<td>" . $row[5] . "</td>";
                                                        echo "<td>" . $row[6] . "</td>";
                                                        echo "<td>" . $row[7] . "</td>";
                                                        echo "<td>";
                                                        echo "<span style='display:none'>". $row[0] ."</span>";
                                                        echo '<button id="btnedit" class="btn btn-primary btnaction"><i class="icon-pencil icon-white"></i></button>&nbsp;';
                                                        echo '<button id="btndelete" class="btn btn-danger btnaction"><i class="icon-trash icon-white"></i></button>';
                                                        echo "</td>";
                                                        echo "</tr>";
                                                        $j++;
                                                    }
                                                }else{
                                                    echo "<tr>";
                                                    echo "<td colspan='9'><i>No data</i></td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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