<?php
define('_ROOT',__DIR__);
/*__FILE__	심볼릭 링크를 통해 해석된 경우를 포함한 파일의 전체 경로와 이름. include 내부에서 사용할 경우, include된 파일명이 반환됩니다.*/
define('_APP',_ROOT."/app");
define('_CORE',_APP."/core");
define('_CONTROLLER',_APP."/controller");
define('_MODEL',_APP."/model");
define('_VIEW',_APP."/view");
define('_CONFIG',_APP."/config");
define('_PUBLIC',_ROOT."/public");

/* str_replace : 발견한 모든 검색 문자열을 치환 문자열로 교체*/

define('_URL',str_replace('/index.php','',$_SERVER['PHP_SELF']));
define('_SRC',_URL.'/public');
define('_IMG',_SRC.'/img');
define('_CSS',_SRC.'/common/css');
define('_JS',_SRC.'/common/js');
require_once(_CONFIG."lib.php");

Param::init();
Controller::run();