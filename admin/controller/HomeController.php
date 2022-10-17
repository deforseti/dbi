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
		} elseif(isset($_POST['save_logo']) && !empty($_FILES) && mb_strtolower(end(explode(".", $_FILES['site_logotype']['name'])) === 'png')) {
            $errors_post = Core::saveLogo();
        } elseif (isset($_POST['delete_logo'])) {
            $errors_post = Core::deleteLogo();
        }

		$data_object = Home::getHomeData();

		$rombs_data = Home::getRombData();

		$this->data_errors['rombs'] = $rombs_data;
		$this->data_errors['errors_post'] = $errors_post;
		$this->data_errors['faq'] = Faq::get_questions($data_object['id']) ?? [];
		TemplateController::actionTemplate($template,$data_object,$this->data_errors);
		return true;
	}
}