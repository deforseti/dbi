<?php

class HomeController
{
	public function actionHome($object)
	{
        if (!empty($object['redirect_type']) && !empty($object['redirect_url']) && Core::check_redirect_available($object['redirect_type'])) {
            header("Location: " . $object['redirect_url'], true, $object['redirect_type']);
            exit();
        }
		$left_menu_on_home = Home::getLeftMenu();
		$rombs_data = Home::getRombsData($object);

		$metadata['left_menu'] = $left_menu_on_home;
		$metadata['rombs'] = $rombs_data;

		TemplateController::actionTemplate($object['type'],$object,$metadata);
		return true;
	}
}