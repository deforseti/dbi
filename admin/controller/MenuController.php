<?php

class MenuController
{
	public $type_pages = array(
		'page' => 'Продукт',
		'category' => 'Категория',
		'generalpage' => 'Общие страницы'
	);

	public $data_return_elements = array();

	public $data_menus = array();

	public $item_id_arr = array();

	public $html_menu = '';

	public $structure_menu = array();

	public function actionMenu($template)
	{
	    $cur_city = $_GET['city'] ?? '0';
        // save structure menu
		$this->saveStructureMenu();


        $this->get_data_list_items($cur_city);
		$this->get_menu();
		$this->if_menu_id_isset();



        $this->get_menu_cities();
        $this->data_menus['cur_city'] = $cur_city;
		TemplateController::actionTemplate($template,$this->data_return_elements,$this->data_menus);
		return true;
	}

	// выборка всех елементов для построение списка в меню
	public function get_data_list_items($city_id = 0)
	{
		foreach ( $this->type_pages as $type => $name ) {
			$data_type = Menu::get_data_element($type,$city_id);
			$ar['name_block'] = $name;
			$ar['list_elems'] = $data_type;
			$this->data_return_elements['element_'.$type] = $ar;
		}
	}

	public function get_menu()
	{
		$data = Menu::get_list_menu();
		$this->data_menus['menu_list'] = $data;
	}

	public function if_menu_id_isset()
	{
		if( isset($_GET['menu_id']) )
		{
			$data = Menu::get_menu_by_id((int)$_GET['menu_id']);
			$this->data_menus['menu_data'] = $data;

			$structure_menu = $this->getDataElemMenu();
			if( strlen( $this->data_menus['menu_data']['relation_pages']) )
			{
				$data = $this->getDataItemMenu();
				$this->htmlStructureMenu($data,$structure_menu);
			}
			
		}
	}

	public function saveStructureMenu()
	{
		$data = NULL;
		if( isset($_POST['save_structure_menu']) && isset($_GET['menu_id']) )
		{
			$menu_id = (int)$_GET['menu_id'];
			$structure = $_POST['structure_menu'];
			global $db;
			$sql = "UPDATE menu SET relation_pages = '".$structure."' WHERE id = '".$menu_id."' ";
			$data = $db->query($sql);
		}
		$this->data_menus['menu_saved'] = $data;
	}

	public function getDataElemMenu()
	{
		$structure_menu = json_decode($this->data_menus['menu_data']['relation_pages'],TRUE);
		$this->getIdsItemStructureMenu($structure_menu);
		return $structure_menu;
	}

	public function getIdsItemStructureMenu($structure_menu)
	{
		if( is_array($structure_menu) )
		{
			foreach ( $structure_menu as $k => $v ) {
				array_push($this->item_id_arr,$v['id']);
				if( isset($v['children']) && count($v['children']) > 0 )
				{
					$this->getIdsItemStructureMenu($v['children']);
				}
			}
		}
	}

	public function getDataItemMenu()
	{
		$data = Menu::GetItemDataStructure($this->item_id_arr);
		return $data;
	}

	public function htmlStructureMenu($data_sorted_elements,$structure_menu)
	{
		$this->htmlGenerateMenu($data_sorted_elements,$structure_menu);
		$this->data_menus['html_menu'] = $this->html_menu;
	}

	public function htmlGenerateMenu($data_sorted_elements,$structure_menu,$wrapp=false)
	{
		if( is_array( $structure_menu ) )
		{
			if( $wrapp )
			{
				$this->html_menu .= '<ol class="dd-list">';
			}

			foreach ($structure_menu as $k => $item) {
				$this->html_menu .= '<li class="dd-item" data-id="'.$item['id'].'">';
				$this->html_menu .= '<div class="dd-handle">'.$data_sorted_elements[$item['id']]['post_name'].'</div>';
				$this->html_menu .= '<span class="remove_item_menu">Удалить</span>';
				if( isset($item['children']) && count($item['children']) > 0 )
				{
					$this->htmlGenerateMenu($data_sorted_elements,$item['children'],true);
				}
				$this->html_menu .= '</li>';
			}

			if( $wrapp )
			{
				$this->html_menu .= '</ol>';
			}
		}
		
	}

	public function get_menu_cities()
    {
        $menu = array();
        $cities = Regionality::getNameCities() ?? [];
        $cities[] = ['id' => '0', 'name' => 'Украина', 'href' => '/admin/admin.php?page=menu'];
        if (!empty($cities)) {
            foreach ($cities as $key => $city) {
                $menu[$key + 1]['id'] = $city['id'];
                $menu[$key + 1]['name'] = $city['name'];
                $menu[$key + 1]['href'] = 'https://' . $_SERVER['SERVER_NAME'] . '/admin/admin.php?page=menu' . ($city['id'] === '0' ? '' : '&city=' . $city['id']);
            }
        }
        $this->data_menus['menu_cities'] = $menu;
    }
}