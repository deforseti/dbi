<?php
/**
* PageModel
*/
class Page
{
	public static function getFiltersProduct($post_id)
    {
        global $db;

        $data = $db->query("SELECT * FROM dbi_filters_values WHERE post_id={$post_id}");
        return Db::returnResults($data) ?? [];
    }
}