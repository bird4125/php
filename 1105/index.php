<?php 
	$db = new PDO("mysql:host=127.0.0.1;dbname=1102;charset=utf8","root","");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$type = isset($_GET['type']) ? $_GET['type'] : "main";

	if (isset($_POST['action'])) {
		include_once("./action.php");
	}

	include_once("./{$type}.php");
?>
