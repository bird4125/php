<?php
	$list = $db->query("SELECT * FROM `comment` where idx='{$_GET['idx']}'")->fetch();
	echo "<p>{$list['idx']} / {$list['content']} / {$list['date']}</p>";
?>
<a href="./">목록</a>
<a href="./?type=update&amp;idx=<?php echo $_GET['idx']?>">수정</a>
<a href="./?type=delete&amp;idx=<?php echo $_GET['idx']?>">삭제</a>