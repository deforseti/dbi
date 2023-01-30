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
			return $this->switcher($object);
		}
	}

	public function switcher($object)
	{
		global $db;
		$sql_arr = array();

		foreach ( $this->langs as $lng ) {
			$sql_arr[] = $lng . " = " . "'" . $object['id']. "'";
		}
		$sql_fragment = implode(" OR ",$sql_arr);
		$data = $db->query("SELECT ru,uk,en,city_id,main_post FROM langs WHERE ".$sql_fragment." ");
		$l_result = Db::returnResults($data) ?? [];
		$an_l = [
			'lngs' => $l_result,
			'lang' => $object['lang']
		];
		self::langSwicherHtml($an_l,$this->langs,$this->main_lang,$object);
		return compact('object','an_l');
	}

	public function switcherLocal($_data)
	{
	    global $db;
        $main_post = $_data['an_l']['lngs']['main_post'] ?: $_data['an_l']['lngs']['ru'] ?: $_data['object']['id'];
        $object = $_data['object']['lang'] === 'ru' ? $_data['object']
            : Db::returnResults($db->query("SELECT * FROM `dbi_posts` WHERE id=" . $main_post));
        if( isset($_GET['post_id']) && $_GET['page'] != 'singlorder' )
        {
            global $db;
            $sql = "SELECT langs.* FROM langs ";
                   // JOIN regional_cities ON langs.city_id = regional_cities.id or langs.city_id = 0";
            $sql .=  $main_post > 0
                ? "WHERE main_post = {$main_post} or ru = {$main_post} ORDER BY main_post,city_id"
                : "WHERE main_post = {$_data['an_l']['lngs']['ru']} or ru = {$_data['an_l']['lngs']['ru']} ORDER BY main_post,city_id";
            $result = Db::returnResults($db->query($sql),true) ?? [];

            foreach ($result as $r) {
                if ($r['ru'] === $_data['an_l']['lngs']['ru']) {
                    $post_lang['current']['ru'] = $r['ru'];
                    $post_lang['current']['uk'] = $r['uk'];
                    $post_lang['current']['en'] = $r['en'];
                } else {
                    $post_lang['cities'][$r['city_id']] = $r['ru'];
                }
            }
            $an_local = [
                'lngs' => $post_lang['cities'],
                'lang' => $object['lang'],
                'cur_post' => $_data['an_l']['lngs']
            ];
            $cities = Regionality::getNameCities('WHERE city.id != ' . ($_data['object']['city_id'] ?? 0 )) ?? [];
            self::langSwicherHtmlLocal($an_local,$cities,$object,$_data['an_l']['lngs']['city_id'] ?? 0,(int) $main_post);
        }
	}

	public static function langSwicherHtml($lang_arr,$langs,$main_lang,$object)
	{
		echo '<div class="wrapp_langs_btn">';
		foreach ( $langs as $v ) {
			if( $v == $lang_arr['lang'] )
			{
				?>
					<span class="lang_button_style curr_lang_p"><?=$v?></span>
				<?php
			}elseif( !$lang_arr['lngs'][$v] )
			{
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
					<?php if($city_id = (int)$lang_arr['lngs']['city_id']) :?>
                        <input type="hidden" name="city_id" value="<?=$city_id?>">
                    <?php endif;?>
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

	public function langSwicherHtmlLocal($lang_arr,$cities,$object,$cur_city,$main_post)
    {
        if($lang_arr['cur_post']['city_id'] !== '0') {
            $cities[] = array('id' => '0', 'name' => 'Украина');
        }
        ?>
        <div class="wrapp_langs_btn">
        <?php
        foreach ( $cities as $v ) {
            if ($v['id'] === $object['city_id']) {continue;}
            if( !$lang_arr['lngs'][$v['id']] && $v['id'] !== '0'){
                ?>
                <div class="pull-left">
                    <form method="POST">
                        <input type="hidden" name="main_post" value="<?=$main_post?>">
                        <input type="hidden" name="city_id" value="<?=$v['id']?>">
                        <input type="hidden" name="page_lang" value="ru">
                        <input type="hidden" name="page_type" value="<?=$object['type']?>">
                        <input type="hidden" name="page_name" value="<?=$object['post_name']?>">
                        <input type="hidden" name="page_url" value="<?= $object['url']?>">
                        <input title="Добавить город <?=$v['name']?>" class="lang_button_style" type="submit" name="add_new_page_local" value="+ <?=$v['name']?>">
                    </form>
                </div>
                <?php
            }else
            {
                ?>
                <div class="pull-left">
                    <a class="lang_button_style" href="?page=<?=$_GET['page']?>&post_id=<?=$v['id'] === '0' ? $lang_arr['cur_post']['main_post'] : $lang_arr['lngs'][$v['id']]?>"><?=$v['name']?></a>
                </div>
                <?php

            }
        }
        echo '</div></div>';
    }
}