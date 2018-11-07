<?php 
	// 데이터베이스 연결
	$db = new PDO("mysql:host=127.0.0.1;charset=utf8;dbname=1102","root","");
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
?>

<!-- 전송 폼 -->
<form method="post">
	<input type="hidden" name="action" value="insert">
	<span>writer:</span><input type="text" name="writer">
	<span>title:</span><input type="text" name="title">
	<span>content:</span><input type="text" name="content">
	<button type="submit">전송</button>
</form>
<form method="post">
	<input type="hidden" name="action" value="update">
	<span>title:</span><input type="text" name="title">
	<span>content:</span><input type="text" name="content">
	<button type="submit">전송</button>
</form>
<form method="post">
	<input type="hidden" name="action" value="delete">
	<span>idx:</span><input type="text" name="idx">
	<button type="submit">전송</button>
</form>

<?php
	 // 전송
	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
			case 'insert':
				$sql = "INSERT INTO board SET writer = '{$_POST['writer']}', title = '{$_POST['title']}', content = '{$_POST['content']}'";
				break;
			case 'update':
				$sql = "UPDATE board SET title = '{$_POST['title']}', content = '{$_POST['content']}' where idx = 1";
				break;
			case 'delete':
				$sql = "DELETE FROM board where idx = '{$_POST['idx']}'";
				break;
		}
		$db->query($sql);
		$sql = "";
	}

	//  출력
	$list = $db->query("SELECT * FROM board")->fetchAll();
	foreach ($list as $data) {
		echo "{$data->idx}/{$data->writer}/{$data->title}/{$data->content}/<br>";
	}
?>