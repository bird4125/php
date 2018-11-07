<h1>보기</h1>
<?php 

	$data = $db->query("SELECT * FROM board where idx = '{$_GET['idx']}'")->fetch();

	echo "{$data->writer}/{$data->title}/{$data->content}";
?>

<a href="http://127.0.0.1/1102_2/?type=update&idx=<?php echo $_GET['idx'] ?>">수정</a>
<a href="http://127.0.0.1/1102_2/?type=delete&idx=<?php echo $_GET['idx'] ?>">삭제</a>
<a href="http://127.0.0.1/1102_2/">뒤로</a>