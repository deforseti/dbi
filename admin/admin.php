<?php
session_start();
if( !isset( $_SESSION['hello_admin'] ) || !$_SESSION['hello_admin'])
{
	die('Зарегистрируйтесь!!!');
}
// var_dump($_SESSION['hello_admin']);

// Обшие настройки
// ini_set('display_errors',1);
// error_reporting(E_ALL);

// Подключение файлов системы
define('ROOT', dirname(__FILE__));

require_once('../components/Core.php');
require_once(ROOT.'/components/AutoloadClass.php');
require_once('../components/Db.php');

$router = new Router();
$router->run();