<?php
$uri = $_SERVER['REQUEST_URI'];
$session_to_admin = '/' . md5('rapira-дает-добро-на вход');
session_start();
if( !isset($_SESSION['hello_admin']) )
{
	$_SESSION['hello_admin'] = false;
}
if( $session_to_admin == $uri)
{
	$_SESSION['hello_admin'] = true;
	header('Location: ../admin/admin.php?page=home&post_id=1');
	exit();
}

// Обшие настройки
// ini_set('display_errors',0);
// error_reporting(E_ALL);

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/AutoloadClass.php');

$router = new Router();
$router->run();