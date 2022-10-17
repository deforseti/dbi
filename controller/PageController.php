<?php

class PageController
{
	
	public function actionPage($object)
	{
        if (!empty($object['redirect_type']) && !empty($object['redirect_url']) && Core::check_redirect_available($object['redirect_type'])) {
            header("Location: " . $object['redirect_url'], true, $object['redirect_type']);
            exit();
        }
        $object['filters'] = Page::getFiltersProduct($object['id']);
        TemplateController::actionTemplate($object['type'],$object);
		return true;
	}
}