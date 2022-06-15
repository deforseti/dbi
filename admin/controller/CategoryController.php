<?php

class CategoryController
{
	public $data_array = array(
		'position_element' => ''
	);

	public $parent_tree = array();

	public function actionCategory($template)
	{
		$this->saveCategoryPositions();
		$this->initModel($template);


		return true;
	}

	public function initModel($template)
	{
		$data_object = Category::getCategories($template);

		$structure_cats = $this->getStructureCategory($data_object);

		TemplateController::actionTemplate($template,$this->parent_tree,$this->data_array);
	}

	public function saveCategoryPositions()
	{
		if( isset($_POST['save_element_position']) )
		{
			$post_data = $_POST['sortable_element'];
			$errors = Category::saveSortableElement($post_data);
			$this->data_array['position_element'] = $errors;
		}
	}

	public function getStructureCategory($categories)
	{
		$parent_arr = array();
		foreach ( $categories as $k => $parent ) {
			$parent_arr[$parent['parent']][$parent['id']] = $parent;
		}

		$this->parent_tree = $parent_arr[0];

		$this->GenerateCatTree($this->parent_tree,$parent_arr);
	}

	public function GenerateCatTree(&$parent_tree,$parents_array)
	{
		foreach ( $parent_tree as $k => $item ) {
			if( !isset( $item['children']) )
			{
				$parent_tree[$k]['children'] = array();
			}
			if( array_key_exists($k, $parents_array))
			{
				$parent_tree[$k]['children'] = $parents_array[$k];
				$this->GenerateCatTree($parent_tree[$k]['children'],$parents_array);
			}
		}
	}
}