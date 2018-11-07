<?php
Class Model_board extends Model {
	//getList
	function getList(){
		$this->sql = "SELECT * FROM board order by `date` desc";
		return $this->fetchAll();
	}
	//getListNum
	function getListNum(){
		return $this->cnt();
	}
	//getView
	function getView(){
		$this->sql = "SELECT * FROM board where idx='{$this->param->idx}'";
		return $this->fetch();
	}
	//board create
	function create(){
		$this->sql = "
		CREATE TABLE `board` (
		`idx` int not null AUTO_INCREMENT,
		`subject` varchar(255),
		`name` varchar(255),
		`pw` varchar(255),
		`content` text,
		`date` datetime,
		PRIMARY KEY (`idx`)
		);
		";
		$this->query();
	}
	//action
	function action(){
		header("Content-type:text/html;charset=utf8");
		$this->table = 'board';
		$cancel = $add_sql = "";
		$msg = "완료되었습니다.";
		$url = $this->param->get_page;
		isset($_POST['pw']) && md5($_POST['pw']);
		switch($_POST['action']){
			case 'insert' :
				$add_sql .= ", date=now()";
			break;
			case 'update' :
				$url .= "/view/{$this->param->idx}";
			case 'delete' :
				access($this->cnt("SELECT * FROM board where pw='{$_POST['pw']}' and idx='{$this->param->idx}'"),"비밀번호가 일치하지 않습니다.");
				$add_sql .= " where idx='{$this->param->idx}';";
				unset($_POST['pw']);
			break;
		}
		$cancel .= "action/table/idx/";
		$column = $this->getColumn($_POST,$cancel).$add_sql;
		$this->sql = $this->combine($column);
		access(!$this->query(),$msg,$url);
	}
}