<?php

/**
* router
*/
class Router
{

	/**
	*	return request string
	*/
	private function getURI()
	{
		if ( !empty($_SERVER['REQUEST_URI']) )
		{
			$array_replase = array( "'",'"','%','~','(','{','[','`','eval','+' );
			$uri_arr = explode('/', strtok(str_replace($array_replase,'',$_SERVER['REQUEST_URI'] ), '?')  );
			return $uri_arr[(count($uri_arr) - 1)];
		}
	}

	public function run()
	{
		$uri = $this->getURI();

		if( !strlen($uri) )
		{
			$uri = 'ru';
		}

		$paramObj = $this->getNameObject($uri);


		$this->setLang($paramObj['lang']);
		// init plagins 
		$this->initPlagins();


		// 
		/**
		*	опредиление контроллера и его метода
		*/

		$segments = 'page404';
		if( isset($paramObj['type']) )
		{
			$segments = $paramObj['type'];
		}

		$segments = $this->search($segments);


		$controllerName = ucfirst( $segments . 'Controller' );

		$actionName = 'action' . ucfirst( $segments );

		// подключение файла класса контроллера
		// $controllerFile = ROOT . '/controller/' . $controllerName . '.php';

		// создание обьекта контроллера и вызов метода
		$controllerObject = new $controllerName;

		$result = $controllerObject->$actionName($paramObj);

		if( !$result ){
			echo 'класс не инициализирован';
		}

		
		global $db;
		$db->close();
	}

	private function getNameObject($uri)
	{
		global $db;
		$db = Db::getConnection();
		$data = $db->query('SELECT * FROM dbi_posts WHERE url = "'.$uri.'" ');
		$array =  Db::returnResults($data);
		return $array;
	}

	private function setLang($lang)
	{
		global $LANG;
		$LANG = $lang;
		if( empty($LANG) ) {
			$LANG = 'ru';
		}
	}

	private function search($segments)
	{
		if( isset($_GET['search']) )
		{
			$segments = 'search';
		}
		return $segments;
	}

	private function initPlagins()
	{
		$ControllerMail = new ControllerMail();
		$ControllerMail->initSendMess();
	}

}