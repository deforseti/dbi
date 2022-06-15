<?php 

class LangController
{
	public function actionLang()
	{
		if( isset($_POST['add_new_page_lang']) )
		{
			$langAction = new Lang();
			$langAction->createLang();
		}
	}
}