<?php
class SetLang
{
	public static function actionSetLang($lang)
	{
		session_start();
		$_SESSION['curr_lang'] = $lang;
	}
}