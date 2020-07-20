<?php
    function openconnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";
        $conn = new mysqli($servername, $username, $password,$dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    
    function closeconnection($conn){
        $conn->close();
    }
    
    function selectdata($tablename, $conn, $condition=""){
        $sql = "SELECT * FROM " . $tablename . $condition;
        $result = $conn->query($sql);
        return $result;
    }
    
    function totalrows($tablename, $conn , $condition=""){
        $sql = "SELECT count(*) as COUNT FROM " . $tablename . $condition;
        $result = $conn->query($sql);
        return $result;
    }
    
    function deleteData($tablename,$conn, $condition=""){
        $sql = "DELETE FROM ". $tablename . $condition;
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        }
    }
    
    function insertNewsFeed($obj,$conn){
        $sql = "INSERT INTO tblnewsfeed (title, description, created) VALUES ('". $obj->title ."','". $obj->description ."', '". date("Y-m-d h:i:s") ."')";
        if ($conn->query($sql) === TRUE) {
            return $conn->insert_id;
        }
    }
    
    function insertStudent($obj,$conn){
        $sql = "INSERT INTO tblstudents (idcard, firstname, lastname,gender,address,class,rank) VALUES "
                . "('". $obj->idcard ."','". $obj->firstname ."','". $obj->lastname ."','". $obj->gender . "','" . $obj->address ."','" . $obj->classtext . "','" . $obj->rank . "')";
        if ($conn->query($sql) === TRUE) {
            return $conn->insert_id;
        }
    }
    
    function updateNewsFeed($obj,$conn){
        $sql = "UPDATE tblnewsfeed SET title='". $obj->title ."', description = '". $obj->description ."' WHERE id=" . $obj->id;
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        }
    }
    
    function updateStudent($obj,$conn){
        $sql = "UPDATE tblStudents SET idcard='". $obj->idcard ."', firstname = '". $obj->firstname 
                ."', lastname ='" . $obj->lastname . "', gender = " . $obj->gender 
                . ", Address = '" . $obj->address. "', class = '" .$obj->classtext 
                . "', rank = '" . $obj->rank .  "' WHERE id=" . $obj->id;
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        }
    }
?>

