<?php
class Lang
{
	public $lang_code = array(
		'ru' => 'RU',
		'ua' => 'UA',
		'en' => 'EN'
	);
	public function getDataLang($object)
	{
		$this->greateMultilangPost($object);
	}

	public function greateMultilangPost($object)
	{
		global $db;
		$data = $db->query("SELECT relation_lang FROM dbi_posts WHERE id = '".$object['id']."' ");
		$data = Db::returnResults($data);
		$object['relation_lang'] = $data['relation_lang'];
		?>
		<div class="col-lg-6 switcher-lang">
			<div class="col-lg-2">
				<span>Текущий язык: <?=$object['lang']?></span>
			</div>
		<?php

		if( isset($object['relation_lang']) && strlen($object['relation_lang']) > 3 )
		{
			$arr_mlt_lng = json_decode($object['relation_lang'],TRUE);
			$this->generateLinkLangHTML($arr_mlt_lng,$object);

		}else
		{

			foreach ($this->lang_code as $code => $name ) {
				if( $object['lang'] == $code )
				{
					continue;
				}
				$this->formAddLangPost($code,$name,$object['id']);
			}

		}
		?>
		</div>
		<?php
		
	}

	public function generateLinkLangHTML($arr,$object)
	{
		foreach ($this->lang_code as $code => $name ) {
			if( $object['lang'] == $code )
			{
				continue;
			}
			if( isset($arr[$code]) )
			{
				$this->linkRedactLangPost($code,$name,$arr[$code]);
			}else
			{
				$this->formAddLangPost($code,$name,$object['id']);
			}
			
		}
	}

	public function formAddLangPost($code,$name,$id)
	{
		?>
			<div class="col-lg-2">
				<form class="" method="POST" action="">
					<input type="submit" class="btn btn-primary" name="create_lang_post" value="+<?=$name?>">
					<input type="hidden" name="lang_code" value="<?=$code?>">
					<input type="hidden" name="lang_id" value="<?=$id?>">
				</form>
			</div>
		<?php
	}

	public function linkRedactLangPost($code,$name,$id)
	{
		?>
			<div class="col-lg-3">
				<a href="?page=<?=$_GET['page']?>&post_id=<?=$id?>"><?=$name?> версия</a>
			</div>
		<?php
	}





	// create multilang post
	public function addMultilangPost($object)
	{
		$id_parent_lang = (int)$_POST['lang_id'];
		if( !$id_parent_lang || strlen($id_parent_lang) == 0 )
		{
			header( 'Location:'. $_SERVER['PHP_SELF']);
			exit();
		}
		$lang_code = $_POST['lang_code'];
		$lang_param = array();

		global $db;

		if( isset($object['relation_lang']) && strlen($object['relation_lang']) > 3 )
		{
			$lang_param = json_decode($object['relation_lang'],TRUE);

			$id_lang_object = $this->copyObject($object,$lang_code);

			$lang_param[$lang_code] = $id_lang_object;
			$arr_ids = array();

			foreach ($lang_param as $key => $id) {
				$arr_ids[] = $id;
			}
			$this->updateRelationLang($arr_ids,json_encode($lang_param));

		}else
		{
			
			$id_lang_object = $this->copyObject($object,$lang_code);

			$lang_param = array(
				'ru' => $id_parent_lang,
				$lang_code => $id_lang_object
			);
			$arr_ids = array($id_parent_lang,$id_lang_object);
			$this->updateRelationLang($arr_ids,json_encode($lang_param));
			
		}

		if( $object['type'] == 'home' )
		{
			$type = $object['type'];
		}else{
			$type = 'singl'.$object['type'];
		}
		unset($_POST);
		header( 'Location: ?page='.$type.'&post_id='.$id_parent_lang);
		exit();
		

	}

	public function copyObject($object,$lang_code)
	{
		global $db;
		$ar = array();
		$ar['title'] = $object['title'];
		$ar['description'] = $object['description'];
		$ar['keywords'] = $object['keywords'];
		$ar['post_name'] = $object['post_name'];
		$ar['content'] = $object['content'];
		$ar['short_content'] = '';
		$ar['url'] = $object['url'] .'-'. $lang_code;
		$ar['type'] = $object['type'];
		$ar['lang'] = $lang_code;
		$ar['relation_lang'] = $object['relation_lang'];
		$ar['categories'] = $object['categories'];
		$ar['parent'] = $object['parent'];
		$ar['position'] = $object['position'];
		$ar['img_post'] = $object['img_post'];
		$sql_string = '';

		$count = 0;
		foreach ( $ar as $k => $post_data ) {
		$p = ', ';
		if( !$count ){
			$p = '';
		}
		$count++;
		$sql_string .= $p."'".addslashes($post_data)."'";
		}

		$errors = $db->query("INSERT INTO dbi_posts 
			(title, description, keywords, post_name, content, short_content, url, type, lang, relation_lang, categories, parent, position, img_post)
			VALUES 
			(".$sql_string.")");
		return $db->insert_id;
	}

	public function updateRelationLang($arr_id,$string)
	{
		$sql_string = 'UPDATE dbi_posts SET relation_lang = CASE id';
		$id_in = '';
		foreach ($arr_id as $key => $id ) {
			$and = ' ';
			if( $key ){
				$and = ', ';
			}
			$sql_string .= " WHEN '".$id."' THEN '".$string."'";
			$id_in .= $and . "'" .$id . "'" ;
		}
		global $db;
		$sql_string .= " ELSE position END WHERE id IN(".$id_in.")";
		$error = $db->query($sql_string);
	}

}