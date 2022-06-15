<?php
class GeneralpageController extends CategoryController
{
	
}

// class GeneralpageController
// {
// 	public $data_array = array(
// 		'position_element' => ''
// 	);
// 	public function actionGeneralpage($template)
// 	{
// 		if( isset($_GET['remove_post']) )
// 		{
// 			$remove_error = SinglPage::removePost();
// 		}
// 		$this->savePagesPositions();
// 		$this->initModel($template);

// 		return true;
// 	}

// 	public function initModel($template)
// 	{
// 		$data_object = Page::getPages('generalpage');
// 		if( !isset($data_object[0]) )
// 		{
// 			$new_data = array();
// 			array_push($new_data,$data_object);
// 			$data_object = $new_data;
// 		}
// 		// $tree = new Generalpage();
// 		// $tree_d = $tree->structureTree();
// 		// echo '<pre>';
// 		// var_dump($tree_d);
// 		// echo '</pre>';
// 		TemplateController::actionTemplate($template,$data_object,$this->data_array);
// 	}

// 	public function savePagesPositions()
// 	{
// 		if( isset($_POST['save_element_position']) )
// 		{
// 			$post_data = $_POST['sortable_element'];
// 			$errors = Page::saveSortableElement($post_data);
// 			$this->data_array['position_element'] = $errors;
// 		}
// 	}
// }