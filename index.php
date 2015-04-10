<?php 
//项目组的配置一个单入口文件实现前后台分离
	define('APP_NAME', 'Home');
	define('APP_PATH', './Home/');
	define('APP_DEBUG', TRUE);
	define('RUNTIME_PATH', APP_PATH . 'Temp/');
	require('./ThinkPHP/ThinkPHP.php');
 ?>