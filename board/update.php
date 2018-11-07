<?php
	$data = $db->query("SELECT * FROM comment WHERE idx='{$_GET['idx']}'")->fetch();
?>
<form action="" method="post">
	<input type="hidden" name="action" value="update">
	<input type="hidden" name="idx" value="<?php echo $_GET['idx']?>">
	<input type="text" name="content" value="<?php echo $data['content']?>">
	<input type="submit" value="전송">
	<a href="./">목록</a>
	<a href="./?type=view&amp;idx=<?php echo $_GET['idx']?>">취소</a>
</form>
