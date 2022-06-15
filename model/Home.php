<?php

class Home
{
	public static function getLeftMenu()
	{
		global $db;
		global $LANG;
		$data = $db->query("SELECT relation_pages FROM menu WHERE menu_name = 'left-menu' AND lang = '".$LANG."' ");
		$data = Db::returnResults($data);
		
		$ids = json_decode($data['relation_pages'],TRUE);
		if( count($ids) )
		{
			$arr_parent = array();
			if( is_array($ids) )
			{
				foreach ( $ids as $key => $id ) {
					$arr_parent[] = $id['id'];
				}
			}
			
			$ids_arr = implode(',',$arr_parent);
			$data1 = $db->query("SELECT * FROM dbi_posts WHERE id IN (".$ids_arr.") ORDER BY FIELD(id, ".$ids_arr.") ");
			$data1 = Db::returnResults($data1,true);
			return $data1;
		}
		
	}

	public static function getRombsData($object)
	{
		global $db;
		$data = $db->query("SELECT meta_value FROM dbi_postmeta WHERE meta_key = 'rombs' AND post_id = '".$object['id']."' ");
		$data_ar = Db::returnResults($data);
		if( strlen($data_ar['meta_value']) > 2 )
		{
			$arr_data = json_decode($data_ar['meta_value'],TRUE);
			return $arr_data;
		}	
	}
}