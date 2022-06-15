<?php
class Autoloader
{
    public static function register()
    {
    	
        spl_autoload_register(function ($class) {
        	$path = array(
				'/components/',
				'/controller/',
				'/model/',
				'/view/'
			);
        	foreach ($path as $dir ) {
        		$file = ROOT . $dir . $class . '.php';
        		if (file_exists($file)) {
                	require $file;
                	break;
            	}
        	}
            
        });
    }
}
Autoloader::register();