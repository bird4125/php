<?php
	//alert
	function alert($str){
		echo "<script>alert('{$str}');</script>";
	}
	//move
	function move($str = false){
		echo "<script>";
		echo $str ? "document.location.replace('{$str}');" : "history.back();";
		echo "</script>";
	exit;
	}
	//access
	function access($bool,$msg,$url = false){
		if(!$bool){
		alert($msg);
		move($url);
	}
	}
	//autoload
	function __autoload($className){
		switch($className){
			case 'Controller':
			case 'Model':
			case 'Param':
				$path = _CORE;
			default : 
				if (strpos("Controller", $className)) {
					$path = _CONTROLLER;
				}
				else {
					$path = _MODEL;
				}
		}
		$path .= "/{$className}.php";
		require_once($path);
	}