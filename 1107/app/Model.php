<?php
	class Model {
		var $db;
		var $sql;

		function __construct () {
			$this->db = new PDO("mysql:host=127.0.0.1;charset=utf8;dbname=1107","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
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

		function json_parse () {
			$this->member_parse();
		}

		function member_parse () {
			if ($this->rowCount("SELECT * FROM member") != 0) {
				return;
			}
			$member_file = file_get_contents(_DATA."/member.json");
			$member_arr = json_decode($member_file);
			$member_arr = $member_arr[0]->data;
			$this->query("
				CREATE TABLE member (
					idx int NOT NULL AUTO_INCREMENT,
					name varchar(255),
					id varchar(255),
					pw varchar(255),
					age varchar(255),
					area varchar(255),
					level varchar(255),
				 	PRIMARY KEY(idx)
				)
			");
			foreach ($member_arr as $data) {
				$sql = "
					INSERT INTO member SET
					name = '{$data->name}',
					id = '{$data->id}',
					pw = '{$data->pw}',
					age = '{$data->age}',
					area = '{$data->area}',
					level = '{$data->level}'
				";
				$this->query($sql);
			}
		}
 	}

