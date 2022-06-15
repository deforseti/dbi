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

    public static function getHreflangUrls($lang,$id)
    {
        global $db;
        $urls = [];
        $join = [
          'ru' => 'lEFT JOIN langs ON  dbi_posts.id = langs.uk or dbi_posts.id = langs.en',
          'uk' => 'lEFT JOIN langs ON  dbi_posts.id = langs.ru or dbi_posts.id = langs.en',
          'en' => 'lEFT JOIN langs ON  dbi_posts.id = langs.ru or dbi_posts.id = langs.uk',
        ];
        $hreflang = [
            'uk' => 'uk-UA',
            'ru' => 'ru-UA',
            'en' => 'en-UA',
        ];

        $data = $db->query("SELECT dbi_posts.url, dbi_posts.lang FROM dbi_posts $join[$lang] WHERE langs." . $lang . " = $id");
        $count_lang = $data->num_rows;
        $data = Db::returnResults($data) ?? [];

        if ($count_lang === 1) {
            $urls[$hreflang[$data['lang']]] = 'https://' . $_SERVER['SERVER_NAME'] . '/' . $data['url'];
        } elseif($count_lang > 1) {
            foreach ($data as $d) {
                $urls[$hreflang[$d['lang']]] = 'https://' . $_SERVER['SERVER_NAME'] . '/' . $d['url'];
            }
        }

        return $urls;
    }
}