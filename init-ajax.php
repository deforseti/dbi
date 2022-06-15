<?php
// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/AutoloadClass.php');

// db connection 
global $db;
$db = Db::getConnection();

$initAjax = new AjaxController();
$initAjax->actionAjax(strip_tags($_POST['actionMethod']));
//close db connection
$db->close();
exit();