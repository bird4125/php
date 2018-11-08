<?php
namespace App\Controller;
class CoreController {
	
	function __construct () {

		// 무엇을 만들 것인가를 선택
		if (isset($_GET['param'])) {
			$param = explode("/", $_GET['param']);
		}
		$page = isset($param[0]) ? $param[0] : 'main';
		$action = isset($param[1]) ? $param[1] : NULL;
		$idx = isset($param[2]) ? $param[2] : NULL;
		$include_file = isset($action) ? $action : $page;
		if (method_exists($this, $include_file)) {
			$this->{$include_file}();
		}

		if (isset($_POST['action'])) {
			$this->action();
			exit;
		}
		extract((Array)$this);
		include_once(_VIEW."/template/header.php");
		include_once(_VIEW."/{$page}/{$include_file}.php");
		include_once(_VIEW."/template/footer.php");
	}

	static public function run () {
		// 무엇을 만들 것인가를 선택
		if (isset($_GET['param'])) {
			$param = explode("/", $_GET['param']);
		}
		$page = isset($param[0]) ? $param[0] : 'main';
		$page = ucfirst($page);
		$name = "\\App\\Controller\\{$page}Controller";

		// 실제로 생성
		$controller = new $name();
	}
}