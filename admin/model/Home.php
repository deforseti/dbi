<?php

class Home
{
	public static function getHomeData()
	{
		global $db;
		$str = 'lang = "ru"';
		if( isset($_GET['post_id']) )
		{
			$str = "id = '".(int)$_GET['post_id']."'";
		}
		$data = $db->query("SELECT * FROM dbi_posts WHERE type = 'home' AND ".$str." ");
		$data_object = Db::returnResults($data);
		return $data_object;
	}

	public static function getRombData()
	{
		global $db;
		$home_id = 1;
		if( isset($_GET['post_id']) )
		{
			$home_id = (int)$_GET['post_id'];
		}
		$data = $db->query("SELECT meta_value FROM dbi_postmeta WHERE post_id = '".$home_id."' AND meta_key = 'rombs'");
		$data_object = Db::returnResults($data);
		$data_object = json_decode($data_object['meta_value'],TRUE);
		return $data_object;
	}


	public static function saveHomeData()
	{
		global $db;

		$single_id = (int)$_POST['home_id'];
		$ar = array();
		$ar['title'] = $_POST['post_title'];
		$ar['description'] = $_POST['post_description'];
		$ar['keywords'] = $_POST['post_keywords'];
		$ar['post_name'] = $_POST['post_name'];
		$ar['content'] = $_POST['post_content'];
		$ar['short_content'] = '';
		$ar['url'] = $_POST['post_url'];
		$ar['type'] = 'home';
		// $ar['lang'] = 'ru';
		$ar['relation_lang'] = '0';
		$ar['parent'] = '0';
		$ar['position'] = '0';
		$ar['img_post'] = '';

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

		$errors = $db->query("UPDATE dbi_posts SET ".$sql_string." WHERE id = '".$single_id."'");
		return $errors;
	}

	public static function saveRombData()
	{
		global $db;
		$home_id =  1;
		if( isset($_GET['post_id']) )
		{
			$home_id = (int)$_GET['post_id'];
		}
		$romb_data = array(
			'imgs' => $_POST['rmb_img_url'],
			'urls' => $_POST['rmb_link']
		);
		$data_object = json_encode($romb_data);
		$db->query("UPDATE dbi_postmeta SET meta_value = '".addslashes($data_object)."' WHERE post_id = '".$home_id."' AND meta_key = 'rombs' ");
	}
}