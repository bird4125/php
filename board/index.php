<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php
	$db = new PDO("mysql:host=127.0.0.1;dbname=0911;charset=utf8","root","");
	if(isset($_POST['action'])){
		switch($_POST['action']){
			case 'insert' :
				$sql = "INSERT INTO `comment` (`idx`, `content`, `date`) VALUES (NULL, '{$_POST['content']}', NOW());";
			break;
			case 'update' :
				$sql = "UPDATE `comment` SET `content` = '{$_POST['content']}' WHERE `comment`.`idx` = {$_POST['idx']};";
			break;
			case 'delete' :
				$sql = "DELETE FROM `comment` WHERE `comment`.`idx` = {$_POST['idx']}";
			break;
		}
		$db->query($sql);
		echo "<script>alert('완료되었습니다.'); location.replace('./')</script>";
	}

	$type = isset($_GET['type']) ? $_GET['type'] : 'list';
	include_once("./{$type}.php");
?>
</body>
</html>