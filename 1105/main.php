<?php 
	
	$list = $db->query("SELECT * FROM board")->fetchAll();
	foreach ($list as $data) {
		echo "{$data->idx} <a href='http://127.0.0.1/1105/?type=view&idx={$data->idx}'>{$data->title}</a> {$data->content} <br>";
	}
?>

<a href="http://127.0.0.1/1105/?type=write">글쓰기</a>
