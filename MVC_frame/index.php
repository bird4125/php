<?php
define('_ROOT',dirname(__FILE__)."/");
/*__FILE__	심볼릭 링크를 통해 해석된 경우를 포함한 파일의 전체 경로와 이름. include 내부에서 사용할 경우, include된 파일명이 반환됩니다.*/
define('_APP',_ROOT."application/");
define('_PUBLIC',_ROOT."public/");

define('_MODEL',_APP."model/");
define('_CONFIG',_APP."config/");
define('_CONTROLLER',_APP."controller/");
define('_VIEW',_APP."view/");


$url = str_replace("index.php","","http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}");
/* str_replace : 발견한 모든 검색 문자열을 치환 문자열로 교체*/

define('_URL',$url);
define('_IMG',_URL.'public/img/');
define('_CSS',_URL.'public/common/css/');
define('_JS',_URL.'public/common/js/');
require_once(_CONFIG."lib.php");
new Application();