<?php
/**
* 
*/
class HomeController
{
	public $data_errors = array();

	public function actionHome($template)
	{
		$errors_post = NULL;

		if( isset($_POST['save_home_data']))
		{
			$errors_post = Home::saveHomeData();

			Home::saveRombData();
		}

		$data_object = Home::getHomeData();

		$rombs_data = Home::getRombData();

		$this->data_errors['rombs'] = $rombs_data;
		$this->data_errors['errors_post'] = $errors_post;
		TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		return true;
	}
}