<?php

class PageController
{
	public $data_array = array(
		'position_element' => ''
	);
	public function actionPage($template)
	{
		$this->savePagesPositions();
		$this->initModel($template);


		return true;
	}

	public function initModel($template)
	{
		$data_object = Page::getPages();
		if( !isset($data_object[0]) )
		{
			$new_data = array();
			array_push($new_data,$data_object);
			$data_object = $new_data;
		}
		TemplateController::actionTemplate($template,$data_object,$this->data_array);
	}

	public function savePagesPositions()
	{
		if( isset($_POST['save_element_position']) )
		{
			$post_data = $_POST['sortable_element'];
			$errors = Page::saveSortableElement($post_data);
			$this->data_array['position_element'] = $errors;
		}
	}
}