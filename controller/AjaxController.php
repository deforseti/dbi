<?php 
class AjaxController
{
	public function actionAjax($method)
	{
		Ajax::$method();
	}
}