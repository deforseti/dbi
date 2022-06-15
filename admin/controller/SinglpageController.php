<?php

class SinglpageController
{
	public $data_errors = array();
	public function actionSinglpage($template)
	{
		$errors_post = NULL;
		if( isset($_POST['create_post_data']) )
		{
			$errors_post = SinglPage::greateNewPost();
		}

		if( isset($_POST['save_post_data']))
		{
			$errors_post = SinglPage::savePost();
		}

		if( isset($_GET['remove_post']) )
		{
			$remove_error = SinglPage::removePost($_GET['page']);
		}

		$data_object = array();



		if( isset($_GET['post_id']))
		{
			$data_object = SinglPage::getDataSinglPage();

			$this->data_errors['relation_categories'] = SinglPage::relationCategoryData($template,$data_object['lang']);

			$this->data_errors['errors_post'] = $errors_post;

			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}
		else
		{
			$this->data_errors['relation_categories'] = SinglPage::relationCategoryData($template);
			$template = $template . '-create';
			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}
		
		return true;
	}

}