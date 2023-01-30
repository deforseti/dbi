<?php
/**
* 
*/
class MigrateController
{
	public function actionMigrate($template)
	{
        Migrate::add_changed();
		header('Location:' . 'https://' . $_SERVER['HTTP_HOST'] . '/admin/admin.php');
	}
}