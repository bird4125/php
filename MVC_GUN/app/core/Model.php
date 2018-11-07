<?php
	class Model {
		var $param;
		var $db;
		var $sql;

		function __construct () {
			$this->db = new PDO("mysql:host=127.0.0.1;charset=utf8;dbname=1102","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			$this->param = Param::getInstance();
		}

		function query ($sql = false) {
			if ($sql) $this->sql = $sql;
			if (!$res = $this->db->query($this->sql)) {
				echo "<pre>";
				print_r($this->sql);
				print_r($this->db->errorInfo());
				echo "</pre>";
			}
			return $res;
		}

		function fetch ($sql = false) {
			if ($sql) $this->sql = $sql;
			$data = $this->query()->fetch();
			return $data;
		}
		
		function fetchAll ($sql = false) {
			if ($sql) $this->sql = $sql;
			$list = $this->query()->fetchAll();
			return $list;
		}
		
		function rowCount ($sql = false) {
			if ($sql) $this->sql = $sql;
			$cnt = $this->query()->rowCount();
			return $cnt;
		}

		function getColumn ($arr, $cancel) {
			$cancel = explode("/", $cancel);
			$column = "";
			foreach ($arr as $key => $value) {
				if (in_array($key, $cancel)) continue;
				$column .= ", {$key} => {$val}";
			}
			$column = substr($column, 2);
			return $column;
		}

		function query_set ($action, $table, $column) {
			switch ($action) {
				case 'insert':
					$sql = "INSERT INTO {$table} SET ";
					break;
				case 'update':
					$sql = "UPDATE {$table} SET ";
					break;
				case 'delete':
					$sql = "DELETE FROM {$table} ";
					break;
			}
			$this->sql = $sql.$column;
			return $this->query();
		}

	}