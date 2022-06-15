<?php
class Search
{
	public function actionSearch()
	{
		$search = Core::ClearSearchString($_GET['search']);
		$result_search['result_search'] = $this->generateSql($search);
		$result_search['request'] = $search;
		$result_search['title'] = 'Поиск по сайту';
		$result_search['description'] = 'Поиск по сайту';
		return $result_search;
	}
	
	private function generateSql($search)
	{
		global $db;
		$sql = "SELECT url,post_name FROM dbi_posts WHERE (post_name LIKE '%".$search."%' OR content LIKE '%".$search."%' OR short_content LIKE '%".$search."%' )";
		$data = $db->query($sql);
		$array =  Db::returnResults($data,true);
		return $array;
	}
}