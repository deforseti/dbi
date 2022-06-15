<?php
class OptionController
{
	public function actionOption($template)
	{
		$sitemap = new SitemapController();
		$sitemap->initSitemapGenerate();

		$object = Option::getOption();
		TemplateController::actionTemplate($template,$object);
		return true;
	}
}