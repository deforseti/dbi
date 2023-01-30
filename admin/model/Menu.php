<?php

class Menu
{
	
	public static function get_data_element($template_name, $city_id = 0)
	{
		global $db;
		$lang = 'ru';
		if( isset($_GET['lang']))
		{
			$lang = trim($_GET['lang']);
		}
		$sql = "SELECT dbi_posts.post_name, dbi_posts.id, regional_cities.name_ru as city
                FROM dbi_posts
                LEFT JOIN regional_cities ON dbi_posts.city_id = regional_cities.id or dbi_posts.city_id = 0
                WHERE type = '".$template_name."' AND lang = '".$lang."' ";
        $sql .= $city_id !== 0 ? " AND city_id IN (0, {$city_id})" : " AND city_id = 0";

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
        $menu = array();

		foreach ($data_object as $d) {
		    $menu[$d['city_id']][] = $d;
        }

		return $menu;
	}

	public static function get_list_menu_cities()
	{
		global $db;
		$sql = "SELECT menu.*,regional_cities.name_ru FROM menu JOIN regional_cities ON regional_cities.id = city_id WHERE city_id > 0";
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
			$data = $db->query(
			    "SELECT dbi_posts.id,concat(dbi_posts.post_name,if(regional_cities.name_ru IS NULL,'',concat(' | ', regional_cities.name_ru))) as post_name,dbi_posts.url,dbi_posts.lang,dbi_posts.relation_lang 
                        FROM dbi_posts
                        LEFT JOIN regional_cities ON dbi_posts.city_id = regional_cities.id
                        WHERE dbi_posts.id IN (".$str_ids.") "
            );
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