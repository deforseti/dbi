<?php

class SinglCategory
{
    public static $all_categories = [];
	public static function getDataSinglCategory()
	{
		$single_id = (int)$_GET['post_id'];
		global $db;
		$data = $db->query(
		        'SELECT dbi_posts.*, 
		        (SELECT count(*) FROM dbi_posts as d_p WHERE d_p.categories LIKE "%\"'.$single_id.'\"%") as count_subcategories 
		        FROM dbi_posts WHERE id = "'.$single_id.'"');
		$data_object = Db::returnResults($data);
		return $data_object;
	}

	public static function greateNewCategory($type)
	{
		global $db;
		$arr_img_url = array(
			'url' => $_POST['img_url'],
			'alt' => $_POST['img_alt'],
			'title' => $_POST['img_title']
		);
		$img_url_json = json_encode($arr_img_url, JSON_UNESCAPED_UNICODE);

		$parent_cat = 0;
		if( isset( $_POST['relation_category'] ) )
		{
			$parent_cat = $_POST['relation_category'];
		}

		$ar = array();

		$ar['title'] = $_POST['post_title'];
		$ar['description'] = $_POST['post_description'];
		$ar['keywords'] = $_POST['post_keywords'];
		$ar['post_name'] = $_POST['post_name'];
		$ar['content'] = $_POST['post_content'];
		$ar['short_content'] = '';
		$ar['url'] = UrlRendering::renderUrl($_POST['post_url']);
		$ar['type'] = $type;
		$ar['lang'] = 'ru';
		$ar['relation_lang'] = '0';
		$ar['categories'] = '0';
		$ar['parent'] = $parent_cat;
		$ar['position'] = '0';
		$ar['img_post'] = $img_url_json;

		$date = date("Y-m-d H:i:s");

		$ar['date_cr'] = $date;
		$ar['date_md'] = $date;

        $canonical = empty($_POST['post_canonical']) ? 'https://' . $_SERVER['HTTP_HOST'] . '/' . $ar['url'] : $_POST['post_canonical'];

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
			(title, description, keywords, post_name, content, short_content, url, type, lang, relation_lang, categories, parent, position, img_post, date_cr, date_md)
			VALUES 
			(".$sql_string.")");
		if( $errors ){
			$last_id = $db->insert_id;
            $errors = Core::setCanonical($last_id, $canonical);
            if ($errors) {
                header('Location: /admin/admin.php?page=singl'.$type.'&post_id='.$last_id);
            }
		}
		return $errors;
	}

	public static function saveCategory()
	{
		global $db;

		$single_id = (int)$_GET['post_id'];
		
		$arr_img_url = array(
			'url' => $_POST['img_url'],
			'alt' => $_POST['img_alt'],
			'title' => $_POST['img_title']
		);
		$img_url_json = json_encode($arr_img_url, JSON_UNESCAPED_UNICODE);

		$parent_cat = 0;
		if( isset( $_POST['relation_category'] ) )
		{
			$parent_cat = $_POST['relation_category'];
		}
		
		$ar = array();
		$ar['title'] = $_POST['post_title'];
		$ar['description'] = $_POST['post_description'];
		$ar['keywords'] = $_POST['post_keywords'];
		$ar['post_name'] = $_POST['post_name'];
		$ar['content'] = $_POST['post_content'];
		$ar['short_content'] = '';
		$ar['url'] = $_POST['post_url'];
		// $ar['type'] = $type;
		// $ar['lang'] = 'ru';
		// $ar['relation_lang'] = '0';
		$ar['categories'] = '0';
		$ar['parent'] = $parent_cat;
		// $ar['position'] = '0';
		$ar['img_post'] = $img_url_json;
		$ar['date_md'] = date("Y-m-d H:i:s");

        $ar['canonical'] = empty($_POST['post_canonical']) ? 'https://' . $_SERVER['HTTP_HOST'] . '/' . $ar['url']
            : $_POST['post_canonical'];
        $_POST['post_redirect_url'] = trim($_POST['post_redirect_url'],' ');
        if (empty($_POST['post_redirect_type']) || empty($_POST['post_redirect_url']) ||
            !Core::check_redirect_available($_POST['post_redirect_type'])) {
            $ar['redirect_type'] = $ar['redirect_url'] = '';
        } else {
            $ar['redirect_type'] = $_POST['post_redirect_type'];
            $ar['redirect_url']  = $_POST['post_redirect_url'];
        }

		$sql_string = '';
		$count = 0;
		foreach ( $ar as $k => $post_data ) {
			$p = ', ';
			if( !$count ){
				$p = '';
			}
			$count++;
			$sql_string .= $p.$k."= '".addslashes($post_data)."'";
		}

		$errors = $db->query("UPDATE dbi_posts SET ".$sql_string." WHERE id = '".$single_id."' ");
		return $errors;
	}

	public static function removeCategory()
	{
		global $db;
		$id = (int)$_GET['remove_post'];
		$page = preg_replace('/singl/', '', $_GET['page']);
		$errors = $db->query("DELETE FROM dbi_posts WHERE id = '".$id."' ");
		if( $errors )
		{
			header('Location: /admin/admin.php?page='.$page);
		}
		return $errors;
	}

	public static function relationCategoryData($type)
	{
		global $db;
		$extrude_post = '';
		if( isset($_GET['post_id']) )
		{
			$extrude_post = "AND id != '".(int)$_GET['post_id']."' ";
		}
		
		$data = $db->query("SELECT post_name,id,parent FROM dbi_posts WHERE type = '".$type."' ".$extrude_post." ORDER BY position ");
		$object_data = Db::returnResults($data);
		if( !isset($object_data[1] ) ){
			$obj = $object_data;
			array_push($object_data,$obj);
		}
		return $object_data;
	} 

	public static function initTreeCategoryRelation($type='category',$lang='ru')
	{
		$type = preg_replace('/singl/', '', $type);
		$data_object = Category::getCategories($type,$lang);
		self::$all_categories = Category::$categories;
		$initTree = new CategoryController();
		$initTree->getStructureCategory($data_object);
		return $initTree->parent_tree;
	}


	public static function echoRelationCategory($arr,$count,$object)
	{
		foreach ( $arr as $key => $post ) {
			if( !$post['parent'] )
			{
				$count = 0;
			}
			$readonly = '';
			if( isset($object['id']) && ( $object['id'] == $post['id'] || $object['id'] == $post['parent']) )
			{
				$readonly = 'disabled';
			}
			?>
				<p style="padding-left:<?=$count?>px;" class="relation-element"> 
				<input
				<?php echo $readonly;
					$checked = '';
					if( isset($object['parent']) && $object['parent'] == $post['id']  )
					{
						$checked = 'checked';
					}
				?>
				type="radio" <?=$checked?> name="relation_category" id="relation_cat_<?=$post['id']?>" value="<?=$post['id']?>">
				<label for="relation_cat_<?=$post['id']?>"><?=$post['post_name']?></label>
				</p>
				<?php 
					if( count($post['children']) > 0 ){
						$count = $count + 20;

						SinglCategory::echoRelationCategory($post['children'],$count,$object);

						$count = $count - 20;
					}
				?>
			<?php
		}
	}
}