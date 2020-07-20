<?php
    $data = $_POST['q'];
    $obj = json_decode($data);
    $connect = new mysqli('localhost', 'root', '', 'FINAL');
    if($connect->connect_error){
        die("Connection error : ".$connect->connect_error);
    }
    $insert = "INSERT INTO tblnewsfeed (title, description, created)
        VALUES ('$obj->title', '$obj->des', '$obj->time')";
    if($connect->query($insert) === TRUE){
        echo $connect->insert_id;
    }else{
        echo "Error : ".$connect->connect_error;
    }
    $connect->close();
?>