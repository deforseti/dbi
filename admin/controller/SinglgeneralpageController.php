<?php
/**
 * 
 */
class SinglgeneralpageController extends SinglcategoryController
{
	public function actionSinglgeneralpage($template)
	{
		return true;
	}
}
/**
* 
*/
// class SinglgeneralpageController
// {
// 	public $data_errors = array();
// 	public function actionSinglgeneralpage($template)
// 	{
// 		$errors_post = NULL;
// 		if( isset($_POST['create_post_data']) )
// 		{
// 			$errors_post = SinglPage::greateNewPost('generalpage');
// 		}

// 		if( isset($_POST['save_post_data']))
// 		{
// 			$errors_post = SinglPage::savePost('generalpage');
// 		}

// 		if( isset($_GET['remove_post']) )
// 		{
// 			$remove_error = SinglPage::removePost();
// 		}

// 		$data_object = array();

// 		// $this->data_errors['relation_categories'] = SinglPage::relationCategoryData();

// 		if( isset($_GET['post_id']))
// 		{
// 			$data_object = SinglPage::getDataSinglPage();

// 			$this->data_errors['errors_post'] = $errors_post;
			
// 			$this->data_errors['relation_categories'] = SinglPage::getAllpages('generalpage');

// 			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
// 		}
// 		else
// 		{
// 			$template = $template . '-create';
// 			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
// 		}
		
// 		return true;
// 	}
// }