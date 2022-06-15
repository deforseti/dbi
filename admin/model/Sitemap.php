<?php

class Sitemap
{
	
	public function initGenerator()
	{
		global $db;
		$data = $db->query("SELECT url,date_md FROM dbi_posts WHERE lang = 'ru' ");
		$data_arr = Db::returnResults($data,true);
		$stringXml = $this->hxmlBody($data_arr);
		$this->InsertInFile($stringXml);

	}

	private function hxmlBody($arr)
	{
		$body = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach ($arr as $k => $v) {
			if( strlen($v['url']) > 1 && $v['url'] != '#' )
			{
				$date = new DateTime($v['date_md']);
				$v['date_md'] = $date->format('Y-m-d');
				$domain = 'https://dbi.com.ua/';
				if( $v['url'] != 'ru' )
				{
					$v['url'] = $domain . $v['url'];
				}else
				{
					$v['url'] = $domain;
				}
				$body .= '<url>';
	
					$body .= '<loc>'.$v['url'].'</loc>';
	
      				$body .= '<lastmod>'.$v['date_md'].'</lastmod>';
	
      				$body .= '<changefreq>monthly</changefreq>';
	
      				$body .= '<priority>1.0</priority>';
	
				$body .= '</url>';
			}

		}

		$body .= '</urlset> ';

		return $body;
	}

	private function InsertInFile($string)
	{

		$file = '../sitemap.xml';
		file_put_contents($file, $string);

	}


}