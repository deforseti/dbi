<?php
class Option
{
	
	static public function getOption()
	{
		global $db;
		$data = $db->query("SELECT * FROM dbi_posts WHERE type = 'option' AND id = '".(int)$_GET['post_id']."' ");
		$data_d = Db::returnResults($data);
		return $data_d;
	}
}