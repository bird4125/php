<?php

	$data = $db->query("SELECT * FROM board where idx = '{$_GET['idx']}'")->fetch();

	echo "idx : {$data->idx}";
	echo "<br>";
	echo "title : {$data->title}";
	echo "<br>";
	echo "content : {$data->content}";

?>
<br>
<a href="http://127.0.0.1/1105/?type=delete&idx=<?php echo $_GET['idx']?>">삭제</a>
<a href="http://127.0.0.1/1105/?type=update&idx=<?php echo $_GET['idx']?>">수정</a>
<a href="http://127.0.0.1/1105">목록</a>