<?php
class Generalpage
{
	public function getGeneralPage()
	{
		global $db;
		$data = $db->query("SELECT id,post_name,categories FROM dbi_posts WHERE type = 'generalpage' AND lang = 'ru'");
		return Db::returnResults($data,true);
	}

	public function structureTree()
	{
		$pages = $this->getGeneralPage();
		$arr_tree = array();
		
		$tree = self::prepareArray($pages);
		self::generateTree($tree,$tree);
		return $tree;
	}

	public static function prepareArray($pages)
	{
		$arr = array();
		if( is_array($pages) )
		{
			foreach ($pages as $k => $v ) {
				$arr[$v['id']] = $v;
			}
		}
		return $arr;
	}

	public static function generateTree(&$tree,$arr_p)
	{
		foreach ( $tree as $k => &$item ) {
			if( !isset($tree[$k]['children']) )
			{
				$tree[$k]['children'] = array();
			}
			$ids_parent = json_decode($tree[$k]['children']);
			if( count($ids_parent) && in_array($tree[$k]))
			{
				
			}
			unset($tree[$k]['categories']);
			
		}
	}
}