<?php 
	$sql = "DELETE FROM board where idx = '{$_GET['idx']}'";

	$db->query($sql);
	echo "<script>location.replace('http://127.0.0.1/1105')</script>";
 ?>