<?php
    $data = $_POST['q'];
    $obj = json_decode($data);
    $connect = new mysqli('localhost', 'root', '', 'final');
    if($connect->connect_error){
        die("Connection error : ".$connect->connect_error);
    }
    $update = "UPDATE tblnewsfeed set title = '$obj->title', description = '$obj->des', created = '$obj->time' where id = ".$obj->id;
    $result = $connect->query($update);
    if($result === TRUE){
        echo "success";
    }else{
        die("Erorr: ". $connect->connect_error);
    }
    $connect->close();
?>