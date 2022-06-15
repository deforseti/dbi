<?php

/**
* router
*/
class Router
{
	private $routes;

	function __construct()
	{
		$this->routes = include(ROOT.'/config/routes.php');
	}


	/**
	*	return request string
	*/
	private function getURI()
	{
		if ( isset( $_GET['page']) )
		{
			return $_GET['page'];
		}else{
			return 'home';
		}
	}

	public function run()
	{
		
		// коннект к базе данных
		global $db;
		$db = Db::getConnection();

		/**
		*	опредиление контроллера и его метода
		*/

		$s_t = $this->dubleLogicTemplate( $this->getURI() );

		$segments = $s_t['segments'];
		$template = $s_t['template'];

		$controllerName = ucfirst( $segments . 'Controller' );

		$actionName = 'action' . ucfirst( $segments );
		// подключение файла класса контроллера
		$controllerFile = ROOT . '/controller/' . $controllerName . '.php';

		if( file_exists($controllerFile) )
		{
			include_once( $controllerFile );
		}

		// создание обьекта контроллера и вызов метода
		$controllerObject = new $controllerName;
		$result = $controllerObject->$actionName($template);
		if( !$result ){
			echo 'класс не инициализирован';
		}
		
		global $db;
		$db->close();
	}

	public function dubleLogicTemplate($seg)
	{
		$arr = [
			'generalpage' => 'category',
			'singlgeneralpage' => 'singlcategory'
		];
		$ar = [
			'segments' => $seg,
			'template' => $seg
		];
		if( $seg != 'home' )
		{
			foreach ( $arr as $key => $v ) {
				if( $key == $seg )
				{
					$ar = [
						'segments' => $v,
						'template' => $seg
					];
					break;
				}
			}
		}
		return $ar;
	}








	public function setDateToPosts()
	{
		global $db;
		

		$period = new DatePeriod(
     		new DateTime('2015-01-01'),
     		new DateInterval('P1D'),
     		new DateTime('2016-12-20')
		);
		$arr_dates = array();

		foreach ($period as $key => $value) {
			$hours1 = rand(0, 2);
			$hours2 = rand(0, 3);
			$min1 = rand(1, 5);
			$min2 = rand(1, 9);
			$sec1 = rand(1, 5);
			$sec2 = rand(1, 9);

    		$dd = $value->format('Y-m-d'); 

    		$dd = $dd . ' ' . $hours1 . $hours2 . ':' . $min1 . $min2 . ':' . $sec1 . $sec2;
    		$arr_dates[] = $dd; 
    		if( $key > 200 )
    		{
    			break;
    		}   
		}
		// var_dump($arr_dates);

	
		$data = $db->query("SELECT id FROM dbi_posts");
		$object_data = Db::returnResults($data,true);
		$count = 0;
		foreach ( $object_data as $key => $p ) {
			$date_mod = '2018-11-0'.rand(1, 9).' '.rand(1, 2).rand(1, 3).':'.rand(0, 5).rand(0, 9).':'.rand(1, 5).rand(0, 9);
			$db->query("UPDATE dbi_posts SET date_md = '".$date_mod."' WHERE id = '".$p['id']."' ");
			$count++;
		}

	}

}