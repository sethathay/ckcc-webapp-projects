<?php
	$data = $_POST['q'];
	$obj = json_decode($data);
	$connect = new mysqli('localhost', 'root', '', 'Final');
	if($connect->connect_error){
		echo "Connection is failed" .$connect->connect_error;
	}
	$update = "UPDATE tblstudents set idcard = '$obj->idcard', firstname = '$obj->fn',
			lastname = '$obj->ln', gender = '$obj->sex', address = '$obj->address',
			class = '$obj->clas', rank = '$obj->rank' WHERE id = ".$obj->id;
	$result = $connect->query($update);
	if($result === TRUE){
		echo "success";
	}else{
		echo "Error : " .$connect->connect_error;
	}
	$connect->close();
?>