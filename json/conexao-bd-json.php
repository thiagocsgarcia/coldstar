<?php 
header('Content-Type:' . "text/plain");
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('../'));
require('../Zend/Loader/Autoloader.php');

Zend_Loader_Autoloader::getInstance();
$config = new Zend_Config_Ini('bd/config.ini','database');
$time4bd = Zend_Db::factory($config->adapter,$config->params);
$time4bd->setFetchMode(Zend_Db::FETCH_OBJ);

?>