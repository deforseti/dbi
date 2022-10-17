<?php

class RegionalityController
{
	public function actionRegionality()
	{
        setcookie("cur_city", $_GET['cur_city']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
	}
}