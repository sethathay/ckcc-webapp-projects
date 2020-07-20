<?php
	session_start();
	$dbuser = $_POST['username'];
	$dbpas = $_POST['password'];
	$connect = new mysqli("localhost", "root", "", "FINAL");
	if($connect->connect_error){
		echo "Connection is fialed" .$connect->connect_error;
	}
	$identifer = "SELECT * FROM tblusers";
	$result = $connect->query($identifer);
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		if($dbuser == $row['gmail'] && $dbpas == $row['password']){
    			$_SESSION['user'] = $dbuser;
    			header("Location: dashboard/index.php");
    			exit();
    		}else{
    			$mess = urlencode('error');
    			header("Location: sign.php?".$mess);
				exit();	
    		}
    	}
	}else{
		echo "Error : ".$connect->error .$connect->connect_error;
	}
	$connect->close();
?>