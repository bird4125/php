
<!-- 전송 폼 -->
<h1>메인</h1>
<?php
	//  출력
	$list = $db->query("SELECT * FROM board")->fetchAll();
	foreach ($list as $data) {
		echo "{$data->idx}/{$data->writer}/<a href='http://127.0.0.1/1102_2/?type=view&idx={$data->idx}'>{$data->title}</a>/{$data->content}";
		echo "<br>";
	}
?>
<a href="http://127.0.0.1/1102_2/?type=write">글쓰기</a>