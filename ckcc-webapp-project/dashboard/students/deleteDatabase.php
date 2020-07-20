<?php
    $idDelete = $_POST['id'];
    $connect = new mysqli('localhost', 'root', '', 'FINAL');
    if($connect->connect_error){
        die("Connection error : ".$connect->connect_error);
    }
    $delete = "DELETE FROM tblstudents where id =" . $idDelete;
    $result = $connect->query($delete);
    if($result === TRUE){
        echo "Success";
    }else{
        die("Erorr: ". $connect->connect_error);
    }
    $connect->close();
?>