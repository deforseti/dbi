<?php
class GeneralpageController
{
	public function actionGeneralpage($object)
	{
        if (!empty($object['redirect_type']) && !empty($object['redirect_url']) && Core::check_redirect_available($object['redirect_type'])) {
            header("Location: " . $object['redirect_url'], true, $object['redirect_type']);
            exit();
        }
		$metadata['relation_prods'] = Category::getChildrenCats($object['id'],$object['type']);
		TemplateController::actionTemplate($object['type'],$object,$metadata['relation_prods']);
		return true;
	}
}