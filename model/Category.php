<?php
class Category
{
    private static $filters = array('materials_id','brands_id','sales');

	public static function getChildrenCats($id,$type='category')
	{
		global $db;
		$data = $db->query("SELECT * FROM dbi_posts WHERE parent = '".$id."' AND type = '".$type."' ORDER BY position");
		$data = Db::returnResults($data,true);
		return $data;
	}

	public static function getProductsByCategory($object, $data = array(), $only_filters = false)
    {
        global $db;
        $where = "WHERE dbi_posts.type = 'page' AND dbi_posts.categories LIKE '%{$object['id']}%' 
            AND dbi_posts.lang='{$object['lang']}'";
        $join  = (empty($data) || $only_filters ? 'LEFT JOIN' : 'INNER JOIN') . ' dbi_filters_values ON dbi_posts.id = dbi_filters_values.post_id ';
        $join  .= '    
            LEFT JOIN dbi_filter_materials AS materials ON materials.id = dbi_filters_values.materials
            LEFT JOIN dbi_filter_brands AS brands ON brands.id = dbi_filters_values.brands';

        if (isset($data['price_min'])) { $where .= " AND dbi_filters_values.price >= {$data['price_min']}";}
        if (isset($data['price_max'])) { $where .= " AND dbi_filters_values.price <= {$data['price_max']}";}
        if (isset($data['sales'])) { $where .= " AND dbi_filters_values.sales > 0";}
        if (isset($data['brands_id'])) {
            $where .= " AND dbi_filters_values.brands in (" . implode(',',$data['brands_id']) .")";
        } if (isset($data['materials_id'])) {
            $where .= " AND dbi_filters_values.materials in (" . implode(',',$data['materials_id']) .")";
        }
        $select = $only_filters ? 'dbi_filters_values.*' : 'dbi_posts.*, materials.name_'.$object['lang'].' as materials_name,brands.name_'.$object['lang'].' as brands_name, dbi_filters_values.*';

        $data = Db::returnResults(
            $db->query("SELECT {$select} FROM dbi_posts {$join} {$where}"),true
        );

        return empty($data) ? array() : $data;
    }
}