<?php
class CategoryController
{
	public function actionCategory($object)
	{
	    $filters_selectors = array(
	        'brands_id' => 'multiple',
            'materials_id' => 'multiple',
            'sales' => 'solo'
        );

        if (!empty($object['redirect_type']) && !empty($object['redirect_url']) && Core::check_redirect_available($object['redirect_type'])) {
            header("Location: " . $object['redirect_url'], true, $object['redirect_type']);
            exit();
        }

        $metadata['filters_selected'] = array();
        if (!empty($_GET)) {
            $metadata = $this->actionFilterCategory($object);

            foreach ($filters_selectors as $selector => $type) {
                if (isset($_GET[$selector])) {
                    $metadata['filters_selected'][$selector] = $type === 'solo' ? $_GET[$selector]
                        : explode(':', $_GET[$selector]);
                } else {
                    $metadata['filters_selected'][$selector] = $type === 'solo' ? '' : array();
                }
            }
        } else {
            $menu = new Menu();
            $metadata['filters']['lists'] = $menu->getFiltersCategory($object['id']);
            $metadata['filters']['checkbox'] = $menu->get_all_filters_checkbox($object['id'], array());
            $metadata['relation_prods'] = Category::getProductsByCategory($object,array());
            $metadata['count_filters'] = $this->getCountProducts($metadata['relation_prods']);
            $metadata['children_cats'] = Category::getChildrenCats($object['id']);
        }

		TemplateController::actionTemplate($object['type'],$object,$metadata);
		return true;
	}

	public function actionFilterCategory($object)
    {
        $data = $this->validateFilter($_GET);
        $menu = new Menu();
        $metadata['filters']['lists'] = $menu->getFiltersCategory($object['id']);
        $metadata['filters']['checkbox'] = $menu->get_all_filters_checkbox($object['id'], $data);
        $metadata['relation_prods'] = Category::getProductsByCategory($object, $data);
        $metadata['count_filters'] = $this->getCountProducts($metadata['relation_prods']);

        return $metadata;
    }

    public function getCountProducts($products)
    {
        $num_category = array(
            'sales' => 0,
            'brands' => array(),
            'materials' => array(),
        );

        foreach ($products as $product) {
            if($product['sales'] !== '' && $product['sales'] !== null) {
                $num_category['sales']++;
            }
            if($product['brands'] !== '' && $product['brands'] !== null) {
                $num_category['brands'][$product['brands']]++;
            }
            if($product['materials'] !== '' && $product['materials'] !== null) {
                $num_category['materials'][$product['materials']]++;
            }
        }

        return $num_category;
    }

    public function validateFilter($get)
    {
        $data = array();
        $solo_checkbox = array('sales');
        $group_checkbox = array('brands_id','materials_id');
        $params = array('price_min','price_max');

        foreach ($get as $key => $filter) {
            if (in_array($key,$solo_checkbox)) {
                $data[$key] = 1;
            } elseif(in_array($key, $params)) {
                $data[$key] = $filter;
            } elseif(in_array($key, $group_checkbox)) {
                $data[$key] = gettype($filter) === 'array' ? $filter : explode(':',$filter);
            }
        }

        return $data;
    }
}