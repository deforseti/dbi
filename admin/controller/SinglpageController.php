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

        $this->data_errors['materials'] = Filter::getFilterListByType('materials');
        $this->data_errors['brands'] = Filter::getFilterListByType('brands');


		if( isset($_GET['post_id']))
		{
			$data_object = SinglPage::getDataSinglPage();

			$this->data_errors['relation_categories'] = SinglPage::relationCategoryData($template,$data_object['lang']);

			$this->data_errors['errors_post'] = $errors_post;

            $this->data_errors['filters_value'] = Filter::get_filters_values_by_post($_GET['post_id']);

            $this->data_errors['faq'] = Faq::get_questions($_GET['post_id']);

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