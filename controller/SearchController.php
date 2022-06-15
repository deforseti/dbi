<?php

class SearchController
{
	public function actionSearch($search_string)
	{
		$search = new Search();
		$data_search = $search->actionSearch();
		TemplateController::actionTemplate('search',$data_search);
		return true;
	}
}