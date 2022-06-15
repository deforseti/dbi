<?php 
class SinglorderController
{
	public function actionSinglorder($template)
	{
		global $db;
		$data = $db->query("SELECT * FROM orders WHERE id = '".(int)$_GET['post_id']."' ");
		$data =  Db::returnResults($data);
		TemplateController::actionTemplate($template, $data);
		return true;
	}
}