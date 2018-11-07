<?php
	$data = $db->query("SELECT * FROM `comment`")->fetchAll();
	foreach($data as $list){
		echo "<p>{$list['idx']} / <a href=\"./?type=view&amp;idx={$list['idx']}\">{$list['content']}</a> / {$list['date']}</p>";
	}
?>
<a href="./?type=write">작성</a>