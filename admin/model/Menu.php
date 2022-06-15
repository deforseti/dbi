<?php

class Menu
{
	
	public static function get_data_element($template_name)
	{
		global $db;
		$lang = 'ru';
		if( isset($_GET['lang']))
		{
			$lang = trim($_GET['lang']);
		}
		$sql = "SELECT post_name,id FROM dbi_posts WHERE type = '".$template_name."' AND lang = '".$lang."' ";
		$data = $db->query($sql);
		$data_object = Db::returnResults($data,true);
		return $data_object;
	}

	public static function get_list_menu()
	{
		global $db;
		$sql = "SELECT * FROM menu";
		$data = $db->query($sql);
		$data_object = Db::returnResults($data);
		return $data_object;
	}

	public static function get_menu_by_id($id_menu)
	{
		global $db;
		$sql = "SELECT * FROM menu WHERE id = '".$id_menu."' ";
		$data = $db->query($sql);
		$data_object = Db::returnResults($data);
		return $data_object;
	}

	public static function GetItemDataStructure($ids_arr)
	{
		$str_ids = implode(', ',$ids_arr);
		$arr_sort_by_id = array();
		if( strlen($str_ids) )
		{
			global $db;
			$data = $db->query("SELECT id,post_name,url,lang,relation_lang FROM dbi_posts WHERE id IN (".$str_ids.") ");
			$data_object = Db::returnResults($data);
			if( is_array($data_object) )
			{
				foreach ($data_object as $k => $v) {
					$arr_sort_by_id[$v['id']] = $v;
				}
			}
		}
		
		return $arr_sort_by_id;
	}

}