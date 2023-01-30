<?php

/**
 * Региональность
 */
class Filter
{
    /**
     * @param $type //Название фильтра
     * @param array $where
     * @return array|null
     */
    private static $filters = array('brands', 'materials');
    private static $filters_checkbox = array('prices', 'sales');

    /**
     * @param $type
     * @param string|array $where
     * @return array|mixed
     */
    public static function getFilterListByType($type, $where = '')
    {
        global $db;

        return DB::returnResults($db->query("
                    SELECT *
                    FROM dbi_filter_{$type}
                    {$where}"), true
        );
    }

    public static function getFilters($post_id, $type_name = '', $type_id = '')
    {
        global $db;

        $sql = "SELECT * FROM dbi_filters WHERE post_id = {$post_id}";

        if ($type_name !== '') {
            $sql .= " AND type_name = '{$type_name}'";
        }
        if ($type_id !== '' && $type_id !== null) {
            $sql .= " AND type_id = '{$type_id}'";
        }

        $result = DB::returnResults($db->query($sql), true);
        return $result;
    }

    /**
     * @param $type Название/тип фильтра.
     * @param $post_id
     * @return array|mixed
     */
    public static function getFiltersByType($type, $post_id)
    {
        global $db;

        $where = empty($post_id) ? '' : "WHERE post_id = {$post_id} and visible = 1";
        return DB::returnResults($db->query("
            SELECT dbi_filters.*,filter.name_ru,filter.name_uk,filter.name_en  
            FROM `dbi_filters` 
            JOIN dbi_filter_{$type} as filter ON  dbi_filters.type_name = '{$type}' and dbi_filters.type_id = filter.id
            {$where}"
        ), true);
    }

    public static function getFiltersCheckbox($post_id, $type_name)
    {
        global $db;

        return DB::returnResults($db->query("
            SELECT type_name,type_id as checked,visible
            FROM `dbi_filters` 
            WHERE post_id = {$post_id} AND type_name IN ($type_name)"
        ), true);
    }

    public static function addFilter($data, $post_id, $type_name)
    {
        global $db;
        $data_insert = array();
        $data = json_decode($data);

        foreach ($data as $d_c) {
            $data_insert[] = sprintf("('%s','%s','%s','%s')", $d_c->id, $d_c->position, $post_id, $type_name);
        }

        $db->query("INSERT INTO dbi_filters (type_id,position,post_id,type_name) VALUES " . implode(',', $data_insert));
        return $db->insert_id;
    }

    public static function addFilterCheckbox($type_id, $post_id, $type_name)
    {
        global $db;
        $data_insert[] = sprintf("('%s','%s','%s','%s')", $type_id, 0, $post_id, $type_name);

        $db->query("INSERT INTO dbi_filters (type_id,position,post_id,type_name) VALUES " . implode(',', $data_insert));
        return $db->insert_id;
    }

    public static function updateFilter($data, $post_id, $type_name)
    {
        global $db;

        $data = json_decode($data) ?? [];

        self::removeFilterValues($post_id, $type_name);
        return self::addFilter($data, $post_id, $type_name);
    }

    public static function removeFilterValues($post_id, $type_name)
    {
        global $db;
        return $db->query("DELETE FROM `dbi_filters` WHERE post_id =$post_id and type_name = '$type_name'");
    }

    public static function editFilter($filter_name, $data)
    {
        global $db;

        return $db->query("UPDATE dbi_filter_{$filter_name} 
                        SET name_uk='" . $data['name_uk'] . "', name_ru='" . $data['name_ru'] . "', 
                        name_en='" . $data['name_en'] . "'
                        WHERE id = '" . $data['id'] . "'");
    }

    public static function removeFilter($type, $id)
    {
        global $db;

        $db->query("DELETE FROM dbi_filter_{$type} WHERE id = $id");
        $db->query("DELETE FROM dbi_filters WHERE type_name = '$type' and type_id = $id");

        return $db->query("UPDATE dbi_posts SET brands_id = 0 WHERE brands_id = $id");
    }

    public static function addFilterList($type, $data)
    {
        global $db;
        $data_insert = array();

        foreach ($data as $d_c) {
            $data_insert[] = sprintf("'%s'", addslashes($d_c));
        }

        $db->query("INSERT INTO dbi_filter_{$type} (name_uk,name_ru,name_en) VALUES (" . implode(',', $data_insert) . ')');

        return $db->insert_id;
    }

    private static function add_menu($city_id)
    {
        global $db;
        $data_insert = array();

        if ((int)$city_id <= 0) return;

        if (DB::returnResults($db->query("SELECT * FROM menu WHERE city_id = {$city_id} ORDER BY id")) !== null) return;

        $menu = DB::returnResults($db->query("SELECT menu_name,relation_pages,lang FROM menu WHERE city_id = 0 ORDER BY id"), true);

        foreach ($menu as $m) {
            $data_insert[] = sprintf("('%s','%s','%s','%s')", $m['menu_name'], $m['relation_pages'], $m['lang'], $city_id);
        }

        $db->query("INSERT INTO menu (menu_name,relation_pages,lang, city_id) VALUES " . implode(',', $data_insert));
    }

    public static function get_all_filters($post_id)
    {
        $result = array();

        foreach (self::$filters as $filter_name) {
            $_filter_list = self::getFilterListByType($filter_name) ?? [];
            $_filters = self::getFiltersByType($filter_name, $post_id) ?? [];
            if (count($_filter_list) !== 0 && count($_filters) !== 0) {
                $_filter_list = array_combine(array_column($_filter_list, 'id'), $_filter_list);
                $result[$filter_name]['filter_list'] = array_combine(array_column($_filters, 'type_id'), $_filters);
                $result[$filter_name]['lists'] = array_diff_key($_filter_list, $result[$filter_name]['filter_list']);
            } else {
                $result[$filter_name]['lists'] = $_filter_list;
                $result[$filter_name]['filter_list'] = $_filters;
            }
        }

        return $result;
    }

    public static function get_all_filters_checkbox($post_id)
    {
        $result = [];
        foreach (self::$filters_checkbox as $filter) {
            $type_name[] = sprintf("'%s'", $filter);
        }

        $_filters = self::getFiltersCheckbox($post_id, implode(',', $type_name)) ?? [];

        if (count($_filters) > 0) {
            $result = array_combine(array_column($_filters, 'type_name'), $_filters);
        }

        return $result;
    }

    public static function getStates($lang = "ru")
    {
        global $db;

        return DB::returnResults($db->query(" SELECT id, name_$lang as name FROM `regional_states`"), true);
    }

    public static function update_filter_value($post_id, $data)
    {
        global $db;

        return $db->query("UPDATE dbi_filters_values SET " . $data['type_name'] . " = '{$_POST['value']}' WHERE post_id={$post_id}");
    }

    public static function add_filter_value($post_id, $data)
    {
        global $db;

        return $db->query("INSERT INTO dbi_filters_values (`post_id`, " . $data['type_name'] . ") VALUES ({$post_id}, '" . $_POST['value'] . "')");
    }

    public static function get_filter_value($post_id, $type_name)
    {
        global $db;

        return DB::returnResults($db->query("SELECT post_id, {$type_name}  FROM dbi_filters_values WHERE post_id={$post_id}"), true);
    }

    public static function get_filters_values_by_post($post_id)
    {
        global $db;

        $data = DB::returnResults($db->query("SELECT * FROM dbi_filters_values WHERE post_id={$post_id}"));
        if ($data === null) {
            $data = array();
        }
        return $data;
    }
}