<?php
	$sql = "DELETE FROM `comment` WHERE `comment`.`idx` = {$_GET['idx']}";
	$db->query($sql);
	echo "<script>alert('완료되었습니다.'); location.replace('./')</script>";