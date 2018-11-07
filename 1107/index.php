<?php
	define('_ROOT',__DIR__);
	/*__FILE__	심볼릭 링크를 통해 해석된 경우를 포함한 파일의 전체 경로와 이름. include 내부에서 사용할 경우, include된 파일명이 반환됩니다.*/
	define('_APP',_ROOT."/app");
	define('_VIEW',_APP."/view");
	define('_CONFIG',_APP."/config");
	define('_PUBLIC',_ROOT."/public");
	define('_DATA',_PUBLIC."/data");
	
	/* str_replace : 발견한 모든 검색 문자열을 치환 문자열로 교체*/
	
	define('_URL',str_replace('/index.php','',$_SERVER['PHP_SELF']));
	define('_IMG',_URL.'/public/img');
	define('_CSS',_URL.'/public/cm/css');
	define('_JS',_URL.'/public/cm/js');
	define('_JQ',_URL.'/public/cm/jquery');

	require_once(_CONFIG."/lib.php");
	require_once(_APP."/Controller.php");
	require_once(_APP."/Model.php");

	new Controller();