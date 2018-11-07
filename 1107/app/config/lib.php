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