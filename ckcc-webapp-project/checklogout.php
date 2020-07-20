<?php
	session_start();
	session_destroy();
	$url = "Location: index.php";
	header($url);
	exit();
?>