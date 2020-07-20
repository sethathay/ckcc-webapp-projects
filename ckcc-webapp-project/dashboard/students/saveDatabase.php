<?php
    $data = $_POST['data'];
    $obj = json_decode($data);
    $connect = new mysqli('localhost', 'root', '', 'FINAL');
    if($connect->connect_error){
        die("Connection error : ".$connect->connect_error);
    }
    $insert = "INSERT INTO tblstudents (idcard, firstname, lastname, gender, address, class, rank)
        VALUES ('$obj->idcard', '$obj->fn', '$obj->ln', '$obj->sex', '$obj->address', '$obj->clas', '$obj->rank')";
    if($connect->query($insert) === TRUE){
        echo $connect->insert_id;
    }else{
        echo "Error : ".$connect->connect_error;
    }
    $connect->close();
?>