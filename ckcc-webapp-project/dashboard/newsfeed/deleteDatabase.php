<?php
    $id = $_POST['q'];
    $connect = new mysqli('localhost', 'root', '', 'Final');
    if($connect->connect_error){
        die("Connection error : ".$connect->connect_error);
    }
    $delete = "DELETE FROM tblnewsfeed WHERE id =" . $id;
    $result = $connect->query($delete);
    if($result === TRUE){
        echo "success";
    }else{
        die("Erorr: ". $connect->connect_error);
    }
    $connect->close();
?>