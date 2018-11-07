<?php
Class Board extends Controller {
	var $list;
	var $data;
	var $listNum;
	var $subject;
	var $name;
	var $content;
	//basic : list
	function basic(){
		$this->list = $this->db->getList();
		$this->listNum = $this->db->getListNum();
	}
	//view
	function view(){
		$this->data = $this->db->getView();
	}
	//write
	function write(){
	if(isset($this->param->idx)){
		$this->data = $this->db->getView();
	}
		$this->action = isset($this->param->idx) ? 'update' : 'insert';
		$this->subject = isset($this->data->subject) ? $this->data->subject : NULL;
		$this->name = isset($this->data->name) ? $this->data->name : NULL;
		$this->content = isset($this->data->content) ? $this->data->content : NULL;
	}
	//delete
	function delete(){
	}
}