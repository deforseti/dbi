<?php
class Category
{
	public static function getRelationProds($id,$type='page')
	{
		$id = '"'.$id.'"';
		global $db;
		$data = $db->query("SELECT * FROM dbi_posts WHERE categories LIKE '%".$id."%' AND type = '".$type."' ORDER BY position");
		$data = Db::returnResults($data,true);
		return $data;
	}

	public static function getChildrenCats($id,$type='category')
	{
		global $db;
		$data = $db->query("SELECT * FROM dbi_posts WHERE parent = '".$id."' AND type = '".$type."' ORDER BY position");
		$data = Db::returnResults($data,true);
		return $data;
	}
}