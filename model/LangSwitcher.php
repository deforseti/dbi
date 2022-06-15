<?php
class LangSwitcher
{
	private static $flags = [
		'ru' => '/images/lang_flag/ru.svg',
		'uk' => '/images/lang_flag/ua.svg',
//		'en' => '/images/lang_flag/us.svg'
	];

	public function echoSwicher($id,$lang)
	{
		$urls = $this->getRelationLangs($id,$lang);
		$this->htmlLang($urls);
	}

	private function htmlLang($urls)
	{
		global $LANG;
		if( is_array($urls))
		{
			?>
				<div class="lang-swicher">
					<?php
						foreach ( $urls as $k => $v ) {
							if( $v['lang'] != $LANG )
							{
								if( $v['url'] == 'ru')
								{
									$v['url'] = '/';
								}
								?>
									<a href="<?=$v['url']?>"><img src="<?=self::$flags[$v['lang']];?>"></a>
								<?php
							}
							
						}
					?>
				</div>
			<?php
		}
		
	}

	private function getRelationLangs($id,$lang)
	{
		$sql = array();
		foreach (self::$flags as $lang_in => $flag) {
			$sql[] = "(SELECT ".$lang_in." FROM langs WHERE ".$lang." = ".$id.")";
		}
		$sql_string = implode(',', $sql);
		global $db;
		$data = $db->query("SELECT url,lang FROM dbi_posts WHERE id IN ( ".$sql_string." ) ");
		
		$result = DB::returnResults($data,true);
		return $result;
	}



}