<?php
class LangSwitcher
{
	public $langs = [
		'ru',
		'uk',
		'en'
	];
	public $main_lang = 'ru';
	public function initLangSwicher($object)
	{
		if( isset($_GET['post_id']) && $_GET['page'] != 'singlorder' )
		{
			$this->switcher($object);
		}
	}

	public function switcher($object)
	{
		global $db;
		$sql_arr = array();

		foreach ( $this->langs as $k => $lng ) {
			$sql_arr[] = $lng . " = " . "'" . $object['id']. "'";
		}
		$sql_fragment = implode(" OR ",$sql_arr);
		$data = $db->query("SELECT ru,uk,en FROM langs WHERE ".$sql_fragment." ");
		$l_result = Db::returnResults($data);
		$an_l = [
			'lngs' => $l_result,
			'lang' => $object['lang']
		];
		self::langSwicherHtml($an_l,$this->langs,$this->main_lang,$object);
	}

	public static function langSwicherHtml($lang_arr,$langs,$main_lang,$object)
	{
		echo '<div class="wrapp_langs_btn">';
		foreach ( $langs as $k => $v ) {
			if( $v == $lang_arr['lang'] )
			{
				?>
					<span class="lang_button_style curr_lang_p"><?=$v?></span>
				<?php
			}elseif( !$lang_arr['lngs'][$v] )
			{
				$ru_id = 0;
				if( $lang_arr['lngs'][$main_lang] )
				{
					$ru_id =  $lang_arr['lngs'][$main_lang];
				}else
				{
					$ru_id = (int)$_GET['post_id'];
				}
				?>
				<form method="POST">
					<input type="hidden" name="ru_id" value="<?=$ru_id?>">
					<input type="hidden" name="page_lang" value="<?=$v?>">
					<input type="hidden" name="page_type" value="<?=$object['type']?>">
					<input type="hidden" name="page_name" value="<?=$object['post_name']?>">
					<input type="hidden" name="page_url" value="<?=$object['url']?>">
					<input title="Добавить перевод страницы <?=$v?>" class="lang_button_style" type="submit" name="add_new_page_lang" value="+ <?=$v?>">
				</form>
				<?php
			}else
			{
				?>
					<a class="lang_button_style" href="?page=<?=$_GET['page']?>&post_id=<?=$lang_arr['lngs'][$v]?>"><?=$v?></a>
				<?php
				
			}
		}
		echo '</div>';
	}

}