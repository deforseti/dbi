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
	    if (isset($_GET['change_city'])) {
            $url = $this->check_regional_page() ?: $_SERVER['HTTP_REFERER'];

            if ($url !== '') {
                header('Location: ' . $url);
                exit();
            }
        }

        $cities = $this->getCityUrl();

		if ( !empty($_SERVER['REQUEST_URI']) )
		{
			$array_replase = array( "'",'"','%','~','(','{','[','`','eval','+' );
			$uri_arr = explode('/', strtok(trim(str_replace($array_replase,'',$_SERVER['REQUEST_URI'] ),'/'), '?')  );

            $city = array_search($uri_arr[0],$cities) ?? 1;

			if ($cities && $city > 1) {
			    if (count($uri_arr) === 1 && array_search($uri_arr[0],$cities) === false) {
			        return ['uri' => '','city_id' => 1]; // нет регион. на главной
                }
                return ['uri' => $uri_arr[1], 'city_id' => $city];
            }
			return ['uri' => $uri_arr[0], 'city_id' => 1];
		}
	}

	public function run()
	{
		$uri = $this->getURI();

		if( !strlen($uri['uri']) )
		{
            $uri['uri'] = 'ru';
		}

		$paramObj = $this->getNameObject($uri['uri'],$uri['city_id']);

        if ($uri['uri'] === 'regionality') {
            $paramObj['type'] = 'regionality';
        }

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

        $paramObj['main_cities'] = Regionality::getNameCities(' WHERE header_visible = 1') ?? [];
        $paramObj['cities_list'] = Regionality::getCities() ?? [];
        $paramObj['faq'] = $this->getFaq($paramObj['id']);

        $current_city = $paramObj['lang'] === 'en' ? 'Kyiv' : ($paramObj['lang'] === 'ru' ? 'Киев' : 'Київ');

        foreach ($paramObj['cities_list'] as $city) {
            if ($city['id'] === $_COOKIE["CURRENT_CITY"]) {
                $current_city = $city['name_'.$paramObj['lang']];
            }
        }

        $short_city = $paramObj['lang'] === 'en' ? 'c. ' : ($paramObj['lang'] === 'ru' ? 'г. ' : 'м. ');
        $paramObj['current_city'] = $short_city . $current_city;

        foreach (Regionality::getStates() as $state) {
            $paramObj['states_list'][$state['id']] = $state['name'];
        }

		$result = $controllerObject->$actionName($paramObj);

		if( !$result ){
			echo 'класс не инициализирован';
		}

		
		global $db;
		$db->close();
	}

	private function getNameObject($uri,$city_id = 1)
	{
		global $db;

		if ($db === null) {
		    $db = Db::getConnection();
        }

        $where = $city_id === 1 ? '' : 'AND city_id = ' .$city_id;
		$data = $db->query('SELECT dbi_posts.*,(SELECT COUNT(*) FROM dbi_posts as d_post WHERE d_post.categories LIKE concat(\'%"\',dbi_posts.id,\'"%\')) as count_chield FROM dbi_posts WHERE url = "'.$uri.'" ' . $where);
		$array =  Db::returnResults($data);
		return $array;
	}

	private function getNameLocalObject($post_id,$city_id = 1, $lang = 'ru')
	{
		global $db;

		if((int)$city_id === 1) {
		    $query = Db::returnResults($db->query("SELECT {$lang} FROM langs WHERE city_id = 1 AND {$lang} = {$post_id}"));
		    if ($query === null) {
                $query = Db::returnResults($db->query("SELECT main_post  FROM langs WHERE {$lang} = {$post_id}"));
                $local_post_id = $query['main_post'] ?? '';
            }
            $local_post_id =  $query[$lang] ?? $query['main_post'] ?? '';
        } else {
            $query = Db::returnResults($db->query("SELECT {$lang} FROM langs WHERE city_id = {$city_id} AND main_post = {$post_id}"));
            $local_post_id = $query[$lang] ?? '';
        }

		if ($local_post_id === '') {
		    return '';
        }
		$data = $db->query('SELECT dbi_posts.url , (SELECT url_part FROM regional_cities WHERE id = '.$city_id.') as city_url FROM dbi_posts WHERE id = "'.$local_post_id.'" ');
		$array =  Db::returnResults($data);

		return $array ?? [];
	}

	private function getCityUrl()
    {
        $result = array();
        global $db;

        $db = Db::getConnection();
        $data = DB::returnResults($db->query('SELECT id,url_part FROM regional_cities'),true) ?? [];

        foreach ($data as $d) {
            $result[$d['id']] = $d['url_part'];
        }
        return $result;
    }

    private function getFaq($post_id)
    {
        global $db;

        $questions = DB::returnResults($db->query("SELECT *  FROM dbi_faq WHERE post_id={$post_id}"),true) ?? [];

        $data = array();

        foreach ($questions as $question) {
            $data[] = array(
                "@type" => "Question",
                "name" => $question['question'],
                "acceptedAnswer" => array(
                    "@type" => "Answer",
                    "text" => $question['answer']
                )
            );
        }

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    private function check_regional_page()
    {
        $url = '';
        if (!empty($_SERVER['REQUEST_URI'])) {
            $array_replase = array( "'",'"','%','~','(','{','[','`','eval','+' );
            $uri_arr = explode('/', strtok(trim(str_replace($array_replase,'',$_SERVER['REQUEST_URI'] ),'/'), '?')  );
            $old_city = $_GET['old'] ?? '';
            $cur_city = $_GET['change_city'] ?? '';

            if ($old_city === '' || $cur_city === '') {
                return '';
            }

            foreach ($uri_arr as $key=>$part) {
                if (preg_match('!change_city=!ui',$part)) {
                    unset($uri_arr[$key]);
                }
                if (preg_match('!old=!ui',$part)) {
                    unset($uri_arr[$key]);
                }
            }

            if (count($uri_arr) === 0) {
                return 'https://' . $_SERVER['SERVER_NAME'];
            }

            $cur_post = $this->getNameObject(end($uri_arr),$old_city);
            $url_part = $this->getNameLocalObject($cur_post['id'],$cur_city,$cur_post['lang']);

            if (empty($url_part['url'])) {
                return '';
            }
            $url = 'https://' . $_SERVER['SERVER_NAME'] . '/' . ($url_part['city_url'] === '' ? '' : $url_part['city_url'] . '/') . $url_part['url'];
        }
        return $url;
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