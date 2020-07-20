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
                function getcurrentdate(){
                    var d = new Date();
                    var month = d.getMonth()+1;
                    var day = d.getDate();
                    var hour = d.getHours();
                    var minute = d.getMinutes();
                    var second = d.getSeconds();

                    var output = d.getFullYear() + '-' +
                        ((''+month).length<2 ? '0' : '') + month + '-' +
                        ((''+day).length<2 ? '0' : '') + day + ' ' +
                        ((''+hour).length<2 ? '0' :'') + hour + ':' +
                        ((''+minute).length<2 ? '0' :'') + minute + ':' +
                        ((''+second).length<2 ? '0' :'') + second;
                    return output;
                 }
                $("#btnaddnew").click(function(){
                    $("#inputnewsfeed").slideDown("slow");
                    $("#focusedInput").focus();
                });
                $("#btncancel").click(function(){
                    $("#inputnewsfeed").slideUp("slow");
                    $("#focusedInput").parent().parent().removeClass("error");
                    $("#focuseddes").parent().parent().removeClass("error");
                    cleardata();
                    
                });
                $(".btnsave").click(function(){
                   var id = $("#hideid").val();
                   var title = $("#focusedInput").val();
                   var des = $("#focuseddes").val();
                   if(title == ""){
                       $("#focusedInput").parent().parent().addClass("error");
                       $("#focusedInput").focus();
                   }else if(des == ""){
                       $("#focusedInput").parent().parent().removeClass("error");
                       $("#focuseddes").parent().parent().addClass("error");
                       $("#focuseddes").focus();
                   }
                   else{
                       $("#focuseddes").parent().parent().removeClass("error");
                       //Call Ajax
                       var data ={"id": id, "title": title , "description": des};
                       var jsondata = JSON.stringify(data);
                       $.post('lib/newsfeed.php',{para: jsondata},function(data,status){
                           if(status == "success"){
                               if($('.btnsave').text() == "Save"){
                                var html ="";
                                html += "<tr>";
                                html += "<td>";
                                html += "1";
                                html += "</td>";
                                html += "<td>";
                                html += title;
                                html += "</td>";
                                html += "<td>";
                                html += des;
                                html += "</td>";
                                html += "<td>";
                                html += getcurrentdate() + '';
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
                            }
                            else{
                                var updaterow = $(".tbllist").find("tr.selectedrow");
                                updaterow.children().eq(1).text(title);
                                updaterow.children().eq(2).text(des);
                                cleardata();
                            }
                           }
                       });
                   }
                });
                function cleardata(){
                    $("#focusedInput").val("");
                    $("#focuseddes").val("");
                    $("#hideid").val("");
                    $("#focusedInput").focus();
                    $('.btnsave').text("Save");
                    setTimeout(function(){$('.tbllist').find('tr').removeClass('selectedrow')},300);
                }
                $(document).on('click','#btnedit',function(){
                    $("#inputnewsfeed").slideDown("slow");
                    $('.tbllist').find('tr').removeClass('selectedrow');
                    var editrow = $(this).parent().parent();
                    $("#hideid").val(editrow.children().eq(4).find('span').text());
                    $("#focusedInput").val(editrow.children().eq(1).text());
                    $("#focuseddes").val(editrow.children().eq(2).text());
                    editrow.addClass('selectedrow');
                    $('.btnsave').text("Update");
                });
                $(document).on('click','#btndelete',function(){
                    $('.tbllist').find('tr').removeClass('selectedrow');
                    var editrow = $(this).parent().parent();
                    editrow.addClass('selectedrow');
                    var r = confirm("Are you sure you want to delete this newsfeed?");
                    if(r == true){
                        var id = editrow.children().eq(4).find('span').text();
                        $.post('lib/newsfeed.php',{delid: id },function(data,status){
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
                        <li class="active">
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
                                            <li>
                                                <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
                                            </li>
                                            /
                                            <li class="active">News Feed</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">News Feed</div>
                                    <div class="pull-right">
                                        Total : <span class="badge badge-info badge-count">
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
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                         <a href="#" id="btnaddnew"><button class="btn btn-success btnaction"><i class="icon-plus icon-white"></i> New</button></a>
                                        </div>
                                    </div>
                                    <div class="span12" name="form" id="inputnewsfeed" style="display:none;">
                                        <form class="form-horizontal" id="newsfeedform">
                                            <fieldset>
                                              <legend>Form News Feed</legend>
                                              <div class="control-group">
                                                <label class="control-label" for="focusedInput">Title</label>
                                                <div class="controls">
                                                  <input class="input-xlarge focused inputval" id="focusedInput" type="text" placeholder="Title">
                                                </div>
                                              </div>
                                              <div class="control-group">
                                                <label class="control-label" for="focuseddes">Description</label>
                                                <div class="controls">
                                                    <textarea rows="4" class="input-xlarge focused inputval" id="focuseddes" placeholder="Description"></textarea>
                                                </div>
                                              </div>
                                              <div class="form-actions">
                                                <input type="hidden" id="hideid"/>
                                                <button type="button" class="btn btn-primary btnsave">Save</button>
                                                <button type="reset" id="btncancel" class="btn">Cancel</button>
                                              </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <hr/>
                                    <table class="table tbllist" style="margin-top:10px;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $list = selectdata("tblnewsfeed",$conn," order by created desc");
                                                if($list->num_rows>0){
                                                    $j = 1;
                                                    while($row = $list->fetch_row()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $j . "</td>";
                                                        echo "<td>" . $row[1] . "</td>";
                                                        echo "<td>" . $row[2] . "</td>";
                                                        echo "<td>" . $row[3] . "</td>";
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
                                                    echo "<td colspan='5'><i>No data</i></td>";
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