<?php
/**
* 
*/
class TemplateController
{
	
	public static function actionTemplate($template,$object=array(),$metadata=array() )
	{
		$route = include(ROOT . '/config/routes.php' );
		$arr_include = array(
			'init_module',
			'header',
			$template,
			'footer'
		);
		
		foreach ( $arr_include as $elem ) {
			include_once( ROOT .'/view/'. $elem . '.php' );
		}
	}
}