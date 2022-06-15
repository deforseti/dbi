<?php
/**
* 
*/
class AutoconnectCssJsController
{
	public static function actionAutoconnectCss()
	{
		$dir = ROOT . '/view/css';
		$files = array_diff(scandir($dir), array('..', '.'));
		if( is_array($files) ){
			foreach ( $files as $k => $file ) {
				if( $file  == 'images' )
				{
					continue;
				}
				echo '<link rel="stylesheet" href="view/css/'.$file.'" type="text/css" media="all" />' . "\n";
			}		
		}
	}
	public static function actionAutoconnectJs()
	{
		$dir = ROOT . '/view/js';
		$files = array_diff(scandir($dir), array('..', '.'));
		if( is_array($files) ){
			foreach ( $files as $k => $file ) {
				echo '<script src="view/js/'.$file.'" type="text/javascript"></script>' . "\n";
			}		
		}
	}
}
