<?php
/**
* 
*/
class AutoconnectCssJsController
{
	public static function actionAutoconnectCssJs()
	{
		$dirs = array(
			''.ROOT . '/view/css',
			''.ROOT . '/view/js'
		);
		foreach ($dirs as $key => $dir ) {
			$files = array_diff(scandir($dir), array('..', '.'));
			if( is_array($files) ){
				foreach ( $files as $k => $file ) {
					if( !$key )
					{
						echo '<link rel="stylesheet" href="css/'.$file.'" type="text/css" media="all" />' . "\n";
					}else
					{
						echo '<script src="js/'.$file.'" type="text/javascript"></script>' . "\n";
					}
				}
			}
		}
		
	}
}