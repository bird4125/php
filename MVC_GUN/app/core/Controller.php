<?php
	class Controller {
		var $param;
		var $model;

		static public function run () {


		function index () {
			if (isset($_POST['action'])) {
				$this->action();
			}
			if (method_exists($this, $this->param->include_file)) {
				$this->{$this->param->include_file};
			}

			require_once(_VIEW."/template/header.php");
			require_once(_VIEW."/{$this->param->type}/{$this->param->include_file}.php");
			require_once(_VIEW."/template/footer.php");
		}
	}