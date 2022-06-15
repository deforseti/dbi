<?php

class SinglcategoryController
{
	public $data_errors = array();
	
	public function actionSinglcategory($template)
	{
		$type = preg_replace('/singl/', '', $template);
		$errors_post = NULL;
		if( isset($_POST['create_post_data']) )
		{
			$errors_post = SinglCategory::greateNewCategory($type);
		}

		if( isset($_POST['save_post_data']))
		{
			$errors_post = SinglCategory::saveCategory();
		}

		if( isset($_GET['remove_post']) )
		{
			$remove_error = SinglCategory::removeCategory();
		}

		$data_object = array();

		// get relation category
		
		if( isset($_GET['post_id']))
		{
			$data_object = SinglCategory::getDataSinglCategory();

			$this->data_errors['relation_categories'] = SinglCategory::initTreeCategoryRelation($template,$data_object['lang']);

			$this->data_errors['errors_post'] = $errors_post;

			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}
		else
		{
			$this->data_errors['relation_categories'] = SinglCategory::initTreeCategoryRelation($template);

			$template = $template . '-create';

			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}

		return true;
	}

}