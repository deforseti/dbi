<?php

class MenuController
{

	public function actionMenu($name_menu)
	{
		
		$data = Menu::getMenuData($name_menu);

		$menuTree = json_decode($data['relation_pages'],TRUE);
		if( is_array($menuTree) && count($menuTree) )
		{
			$menu_html = '';

			$arrItemMenu = Menu::getItemMenuData($menuTree);
			$this->generateHtmlMenu($menu_html,$arrItemMenu,$menuTree,$name_menu);
			echo $menu_html;
		}
		
	}

	public function generateHtmlMenu(&$menu_html,$arrItemMenu,$menuTree,$name_menu,$depth=0)
	{
		include(ROOT .'/view/template/'. $name_menu. '.php');
	}


}