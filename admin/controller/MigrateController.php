<?php
/**
* 
*/
class MigrateController
{
	public function actionMigrate($template)
	{
        Migrate::add_changed();
		header('Location: https://dbi.local/admin/admin.php');
	}
}