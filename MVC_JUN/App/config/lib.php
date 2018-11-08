<?php
namespace App;

spl_autoload_register(function ($className) {
	include_once(_ROOT.'/'.$className.'.php');
});