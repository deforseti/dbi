<?php
class UrlRendering
{
	public static function renderUrl($url)
	{
		$url = mb_strtolower(trim($url));
		$url = self::replaseAZ($url);
		$check = self::checkUrlInDb($url);
		if( $check )
		{
			return $url . '-[такой урл уже существует]';
		}else
		{
			return $url;
		}
	}

	public static function replaseAZ($url)
	{
		$arr_ciricic = [
			'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','і',' '
		];
		$arr_lat = [
			'a','b','v','g','d','e','e','j','z','i','i','k','l','m','n','o','p','r','s','t','u','f','h','ts','ch','sh','sht','','u','','e','yu','ya','i','-'
		];
		return str_replace($arr_ciricic, $arr_lat, $url);
	}

	public static function checkUrlInDb($url)
	{
		global $db;
		$data = $db->query("SELECT id FROM dbi_posts WHERE url = '".$url."' ");
		return Db::returnResults($data);
	}
}