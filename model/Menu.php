<?php

class Menu
{
	public static function getMenuData($menu_name)
	{
		global $db;
		global $LANG;
		$data = $db->query("SELECT relation_pages FROM menu WHERE menu_name = '".$menu_name."' AND lang = '".$LANG."' ");
		$data =  Db::returnResults($data);
		return $data;
	}

	public static function getItemMenuData($arr_id)
	{
		$extruct_id = array();

		Menu::exstructId($extruct_id,$arr_id);
		$str_ids = implode(',',$extruct_id);
		global $db;
		$data = $db->query("SELECT id,post_name,url FROM dbi_posts WHERE id IN (".$str_ids.") ");
		$data =  Db::returnResults($data);
		$data_key_id = array();
		if( is_array($data) )
		{
			foreach ( $data as $k => $v ) {
				$data_key_id[$v['id']] = $v;
			}
		}
		return $data_key_id;
	}

	public static function exstructId(&$extruct_id,$arr)
	{
		foreach ($arr as $k => $v ) {
			$extruct_id[] = $v['id'];
			if( isset($v['children']) && count($v['children']) > 0 )
			{
				Menu::exstructId($extruct_id,$v['children']);
			}
		}
	}

}