<?php

class SinglPage
{
	public static function getDataSinglPage()
	{
		$single_id = (int)$_GET['post_id'];
		global $db;
		$data = $db->query('SELECT * FROM dbi_posts WHERE id = "'.$single_id.'"');
		$data_object = Db::returnResults($data);
		return $data_object;
	}

	public static function greateNewPost($type=false)
	{
        if( !$type )
		{
			$type = 'page';
		}
		global $db;
		$arr_img_url = array(
			'url' => $_POST['img_url'],
			'alt' => $_POST['img_alt'],
			'title' => $_POST['img_title']
		);
		$img_url_json = json_encode($arr_img_url, JSON_UNESCAPED_UNICODE);

		$categories = array();
		{
			if( isset($_POST['relation_category_to_post']) ){
				$categories = $_POST['relation_category_to_post'];
			}
			$categories = json_encode($categories);
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
		$ar['categories'] = $categories;
		$ar['parent'] = '0';
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

	public static function savePost($type=false)
	{
        if( !$type )
		{
			$type = 'page';
		}
		global $db;

		$single_id = (int)$_GET['post_id'];
		
		$arr_img_url = array(
			'url' => $_POST['img_url'],
			'alt' => $_POST['img_alt'],
			'title' => $_POST['img_title']
		);
		$img_url_json = json_encode($arr_img_url,JSON_UNESCAPED_UNICODE);
		if ($img_url_json)
    echo $img_url_json;
else
    echo json_last_error_msg();
		$categories = array();
		if( isset($_POST['relation_category_to_post']) ){
			$categories = $_POST['relation_category_to_post'];
		}
		$categories = json_encode($categories);

		$ar = array();
		$ar['title'] = $_POST['post_title'];
		$ar['description'] = $_POST['post_description'];
		$ar['keywords'] = $_POST['post_keywords'];
		$ar['post_name'] = $_POST['post_name'];
		$ar['content'] = $_POST['post_content'];
		$ar['short_content'] = '';
		$ar['url'] = $_POST['post_url'];
		$ar['type'] = $type;
		$ar['lang'] = 'ru';
		$ar['relation_lang'] = '0';
		$ar['categories'] = $categories;
		$ar['parent'] = '0';
		$ar['img_post'] = $img_url_json;
		$date = date("Y-m-d H:i:s");
        $ar['date_md'] = $date;

        $ar['canonical'] = empty($_POST['post_canonical']) ? 'https://' . $_SERVER['HTTP_HOST'] . '/' . $ar['url']
            : $_POST['post_canonical'];
        $_POST['post_redirect_url'] = trim($_POST['post_redirect_url'],' ');
        if (empty($_POST['post_redirect_type']) || empty($_POST['post_redirect_url']) || !Core::check_redirect_available($_POST['post_redirect_type'])) {
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

	public static function removePost()
	{
		global $db;
		$id = (int)$_GET['remove_post'];
		$type = self::getLocationPlace($_GET['page']);
		$errors = $db->query("DELETE FROM dbi_posts WHERE id = '".$id."' ");
		if( $errors )
		{
			header('Location: /admin/admin.php?page='.$type);
		}
		return $errors;

	}

	public static function relationCategoryData($template='page',$lang='ru')
	{
		global $db;
		$data = $db->query("SELECT post_name,id FROM dbi_posts WHERE type = 'category' AND lang = '".$lang."' ORDER BY position ");
		$object_data = Db::returnResults($data,true);
		return $object_data;
	}

	public static function addRelationCategoryToPost()
	{

	}

	public static function getAllpages($template)
	{
		global $db;
		$id = (int)$_GET['post_id'];
		$data = $db->query("SELECT post_name,id,parent FROM dbi_posts WHERE type = '".$template."' AND id != '".$id."' ");
		$object_data = Db::returnResults($data,true);
		return $object_data;
	}

	public static function getLocationPlace($type)
	{
		$arg = array(
			'singlpage' => 'page',
			'singlgeneralpage' => 'generalpage'
		);
		return $arg[$type];
	}
}