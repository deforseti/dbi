<?php

class Page404Controller
{
	
	public function actionPage404($template)
	{

		$template = '404';
		header("HTTP/1.0 404 Not Found");
		$obj['title'] = '404';
		$obj['description'] = '404';
		TemplateController::actionTemplate($template,$obj);
		return true;
	}
}