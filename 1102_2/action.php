<?php
		switch ($_POST['action']) {
			case 'insert':
				$sql = "INSERT INTO board SET writer = '{$_POST['writer']}', title = '{$_POST['title']}', content = '{$_POST['content']}'";
				break;
			case 'update':
				$sql = "UPDATE board SET title = '{$_POST['title']}', content = '{$_POST['content']}' where idx = {$_GET['idx']}";
				break;
		}
		$db->query($sql);
		echo "<script>location.replace('http://127.0.0.1/1102_2/')</script>";

