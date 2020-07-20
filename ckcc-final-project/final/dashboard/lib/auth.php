<?php
require ("includefiles.php");
$conn = openconnection();
if(isset($_POST["para"])){
    $data = $_POST['para'];
    $obj = json_decode($data);
    $list = selectdata("tblusers",$conn," WHERE username='" . $obj->username ."' AND password='" . $obj->password . "'");
    if($list->num_rows>0){
        session_start();
        $_SESSION["username"] = $obj->username;
        echo 1;
    }else{
        echo 0;
    }
}
closeconnection($conn);
?>
