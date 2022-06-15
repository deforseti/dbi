<?php
/**
* 
*/
class TemplateController
{
	
	public static function actionTemplate($template='404',$object=array(),$metadata=array() )
	{
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