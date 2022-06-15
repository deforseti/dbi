<?php
class SitemapController
{	
	public function initSitemapGenerate()
	{
		if( isset($_POST['generate_sitemap']) )
		{
			$sitemapGenerator = new Sitemap();
			$sitemapGenerator->initGenerator();
		}
	}
}