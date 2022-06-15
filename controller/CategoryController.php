<?php
class CategoryController
{
	public function actionCategory($object)
	{
        if (!empty($object['redirect_type']) && !empty($object['redirect_url']) && Core::check_redirect_available($object['redirect_type'])) {
            header("Location: " . $object['redirect_url'], true, $object['redirect_type']);
            exit();
        }
		$metadata['relation_prods'] = Category::getRelationProds($object['id']);
		$metadata['children_cats'] = Category::getChildrenCats($object['id']);
		TemplateController::actionTemplate($object['type'],$object,$metadata);
		return true;
	}
}