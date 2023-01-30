<?php
/**
 * Региональность
 */
class Regionality
{
    public static function getCities()
    {
        global $db;

        return  DB::returnResults($db->query("
                    SELECT city.id,city.name_uk,city.name_ru,city.name_en,city.header_visible,state.name_ru as state,city.state_id,url_part
                    FROM regional_cities as city 
                    INNER JOIN `regional_states` as state ON state.id = city.state_id"),true
                );
    }

    public static function getNameCities($where = '')
    {
        global $db;
        $sql = "SELECT city.id,city.name_ru,city.name_uk,city.name_en,url_part FROM regional_cities as city ";
        if($where !== '') {
            $sql .= $where;
        }

        return  DB::returnResults($db->query($sql),true);
    }

    public static function editCity($data)
    {
        global $db;

        return $db->query("UPDATE regional_cities 
                        SET name_uk='".$data['name_uk']."', name_ru='".$data['name_ru']."', 
                        name_en='".$data['name_en']."', header_visible=".$data['header_visible']   ."
                        ,state_id='".$data['state_id']."', url_part='".$data['url_part']."'
                        WHERE id = '".$data['id']."'");
    }

    public static function removeCity($id)
    {
        global $db;

        $remove = $db->query("DELETE FROM regional_cities WHERE id = {$id}");
        $db->query("DELETE FROM menu WHERE city_id = {$id}");
        return $remove;
    }

    public static function addCity($data)
    {
        global $db;
        $data_insert = [];

        foreach ($data as $d_c) {
            $data_insert[] = sprintf("'%s'", addslashes($d_c));
        }

        $db->query("INSERT INTO regional_cities (name_uk,name_ru,name_en,state_id,url_part,header_visible) VALUES (" . implode(',',$data_insert) .')');
        if ($insert_id = $db->insert_id) {
            SELF::add_menu($insert_id);
        }

        return $insert_id;
    }

    public static function getStates($lang = "ru")
    {
        global $db;

        return DB::returnResults($db->query(" SELECT id, name_$lang as name FROM `regional_states`"),true);
    }

    private static function add_menu($city_id)
    {
        global $db;
        $data_insert = [];

        if ((int)$city_id <= 0) return;

        if (DB::returnResults($db->query("SELECT * FROM menu WHERE city_id = {$city_id} ORDER BY id")) !== null) return;

        $menu = DB::returnResults($db->query("SELECT menu_name,relation_pages,lang FROM menu WHERE city_id = 0 ORDER BY id"),true);

        foreach ($menu as $m) {
            $data_insert[] = sprintf("('%s','%s','%s','%s')", $m['menu_name'],$m['relation_pages'],$m['lang'],$city_id);
        }

        $db->query("INSERT INTO menu (menu_name,relation_pages,lang, city_id) VALUES " . implode(',',$data_insert) );
    }
}