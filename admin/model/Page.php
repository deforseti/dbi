<?php
/**
* PageModel
*/
class Page
{
	public static function getPages($type=false)
	{
		if( !$type )
		{
			$type = 'page';
		}
		global $db;
		$data = $db->query("SELECT id,post_name,position FROM dbi_posts WHERE type = '".$type."' AND lang = 'ru' ORDER BY position");
		$data =  Db::returnResults($data);
		return $data;
	}

	public static function saveSortableElement($json_string)
	{
		$sortable = json_decode($json_string);
		if( is_array($sortable) && count($sortable) )
		{
			$sql_string = 'UPDATE dbi_posts SET position = CASE id';
			$id_in = '';
			foreach ($sortable as $key => $sort ) {
				$and = ' ';
				if( $key ){
					$and = ', ';
				}
				$sql_string .= " WHEN '".$sort->id."' THEN '".$sort->position."'";
				$id_in .= $and . "'" .$sort->id . "'" ;
			}
			global $db;
			$sql_string .= " ELSE position END WHERE id IN(".$id_in.")";
			$error = $db->query($sql_string);
			return $error;
		}else
		{
			return false;
		}
		
	}

}