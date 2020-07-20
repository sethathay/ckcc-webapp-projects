<?php
require ("includefiles.php");
$conn = openconnection();
if(isset($_POST["para"])){
    $data = $_POST['para'];
    $obj = json_decode($data);
    if($obj->id == ""){
        $insertedid = insertNewsFeed($obj,$conn);
        $count = totalrows("tblnewsfeed",$conn);
        $reval[0] = $insertedid;
        if(isset($count)){
            while($row = $count->fetch_row()) {
                $reval[1] = $row[0];
            }
        }
        header('Content-Type: application/json');
        echo json_encode($reval);
    }
    else{
        updateNewsFeed($obj,$conn);
    }
}
if(isset($_POST['delid'])){
    $del_id = $_POST['delid'];
    deleteData("tblnewsfeed",$conn," WHERE id=". $del_id );
}
closeconnection($conn);
?>