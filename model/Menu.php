<?php

class Menu
{
    private static $filters = array('brands','materials');
    private static $filters_checkbox = array('sales','prices');

	public static function getMenuData($menu_name)
	{
		global $db;
		global $LANG;
        $city_id =  (int) htmlspecialchars($_COOKIE["CURRENT_CITY"]);
        $where = $city_id === 0 ? ' AND city_id = 0 ' : " AND (city_id = 0 OR city_id = {$city_id}) ";
        $data = $db->query("SELECT relation_pages FROM menu WHERE menu_name = '".$menu_name."' AND lang = '".$LANG."' {$where} ORDER BY city_id DESC LIMIT 1");
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

	public static function getFiltersCategory($post_id)
    {
        $result = array();

        foreach (self::$filters as $filter_name) {
            $_filters = self::getFiltersByType($filter_name,$post_id);
            $_filters = empty($_filters) ? array() : $_filters;
            if (count($_filters) > 0) {
                $result[$filter_name] = array_combine(array_column($_filters,'type_id'),$_filters);
            }
        }

        return $result;
    }

    /**
     * @param $type Название/тип фильтра.
     * @param $post_id
     * @return array|mixed
     */
    public static function getFiltersByType($type,$post_id)
    {
        global $db;
        global $LANG;

        return DB::returnResults($db->query("
            SELECT dbi_filters.*,filter.name_ru,filter.name_uk,filter.name_en, 
               (
                       SELECT COUNT(dbi_filters_values.{$type}) 
                       FROM dbi_posts
                       INNER JOIN dbi_filters_values ON  dbi_posts.id = dbi_filters_values.post_id
                       WHERE dbi_filters_values.{$type} = dbi_filters.type_id and dbi_posts.lang = '{$LANG}' 
                         and type = 'page' and dbi_posts.categories LIKE '%\"{$post_id}\"%'
               ) AS count_product
            FROM `dbi_filters` 
            JOIN dbi_filter_{$type} as filter ON  dbi_filters.type_name = '{$type}' and dbi_filters.type_id = filter.id
            WHERE post_id = {$post_id}"
        ),true);
    }

    public static function getFiltersCheckbox($post_id,$type_name)
    {
        global $db;

        return DB::returnResults($db->query("
            SELECT type_name,type_id as checked, visible
            FROM `dbi_filters` 
            WHERE post_id = {$post_id} AND type_name IN ($type_name)"
        ),true);
    }

    public static function get_all_filters_checkbox($post_id, $data)
    {
        $result = array();
        foreach (self::$filters_checkbox as $filter) {
            $type_name[] = sprintf("'%s'", $filter);
        }

        $_filters = self::getFiltersCheckbox($post_id,implode(',',$type_name), $data);
        $_filters = empty($_filters) ? array() : $_filters;

        if (count($_filters) > 0) {
            $result = array_combine(array_column($_filters,'type_name'),$_filters);
        }

        return $result;
    }
}