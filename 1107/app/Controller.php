<?php
	class Controller {

		var $model;
		var $type;
		var $include_file;
		var $idx;
		var $isMember;
		var $member;

		function __construct () {
			$param = explode("/",$_GET['param']);
			$this->type = isset($param[0]) && strlen($param[0]) ? $param[0] : "main";
			$this->action = isset($param[1]) ? $param[1] : null;
			$this->idx = isset($param[2]) ? $param[2] : null;
			$this->include_file = isset($this->action) ? $this->action : $this->type;
			$this->isMember = isset($_SESSION['member']);
			$this->member = $this->isMember ? $_SESSION['member'] : null;
			$this->model = new Model();
			$this->index();
		}

		function index () {
			$this->model->json_parse();
			if (isset($_POST['action'])) {
				$this->model->action();
			}
			if (method_exists($this, $this->include_file)) {
				$this->{$this->include_file};
			}

			$thisArr = (Array)$this;
			extract($thisArr);
			require_once(_VIEW."/header.php");
			require_once(_VIEW."/{$this->type}/{$this->include_file}.php");
			require_once(_VIEW."/footer.php");
		}
	}
	