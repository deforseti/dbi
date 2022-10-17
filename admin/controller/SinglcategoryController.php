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

			foreach (SinglCategory::$all_categories as $category) {
                if ($category['id'] === $_GET['post_id']) {
                    $this->data_errors['is_children'] = $category['parent'] > 0;
                    break;
                }
            }

			$this->data_errors['errors_post'] = $errors_post;
            $cities = Regionality::getNameCities() ?? [];
            $this->data_errors['filters'] = Filter::get_all_filters($_GET['post_id']);
            $this->data_errors['faq'] = Faq::get_questions($data_object['id']);
            $this->data_errors['filters_checkbox'] = Filter::get_all_filters_checkbox($_GET['post_id']);
            $this->data_errors['cities_url'] = array_combine(array_column($cities,'id'),array_column($cities,'url_part'));
			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}
		else
		{
			$this->data_errors['relation_categories'] = SinglCategory::initTreeCategoryRelation($template);

            foreach (SinglCategory::$all_categories as $category) {
                if ($category['id'] === $_GET['post_id']) {
                    $this->data_errors['is_children'] = $category['parent'] > 0;
                    break;
                }
            }

			$template = $template . '-create';

			TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		}

		return true;
	}

}