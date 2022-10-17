<?php
class Lang
{
	protected $lang_arr = array();
	public function createLang()
	{
		$this->lang_arr = [
			'ru_id' => (int)$_POST['ru_id'],
			'page_lang' => $_POST['page_lang'],
			'page_type' => $_POST['page_type'],
			'page_name' => $_POST['page_name'],
			'page_url' => $_POST['page_url'],
            'city_id' => (int)$_POST['city_id']
		];
		$isset_row = $this->testLangInDb();

		$data_pages = $this->generateArrDataPage();
		$id_create_page = $this->createPageLang($data_pages);

		if( $isset_row )
		{
			$this->updateLangs($id_create_page);
		}else{
            $this->createLangs($id_create_page);
		}
    }

	public function createLangLocal()
	{
		$this->lang_arr = [
			'city_id' => (int)$_POST['city_id'],
			'page_lang' => $_POST['page_lang'],
			'page_type' => $_POST['page_type'],
			'page_name' => $_POST['page_name'],
			'page_url' => rtrim($_POST['page_url'],'.php')
		];

        $data_pages = $this->generateArrDataPageLocal();

        if (!$this->check_post($this->lang_arr['city_id'],$this->lang_arr['page_name'],$this->lang_arr['page_url'],$this->lang_arr['page_lang'])) {
            $id_create_page = $this->createPageLang($data_pages);
        }
        if (!$this->testCityLangInDb((int)$_POST['main_post'],(int)$_POST['city_id'])) {
            $this->createLocal($id_create_page,(int)$_POST['main_post'],(int)$_POST['city_id']);
        }
    }

	public function testLangInDb()
	{
		global $db;
		$data = $db->query("SELECT id FROM langs WHERE ru = '".$this->lang_arr['ru_id']."' ");
		return Db::returnResults($data);
	}

	public function testCityLangInDb($main_post,$city_id)
	{
		global $db;
		$data = $db->query("SELECT id FROM langs WHERE main_post = {$main_post} AND city_id = {$city_id}");
		return Db::returnResults($data);
	}

	public function updateLangs($id)
	{
		global $db;
		$sql = "UPDATE langs SET ".$this->lang_arr['page_lang']." = '".$id."' WHERE ru = '".$this->lang_arr['ru_id']."' ";
		$result = $db->query($sql);
	}

	public function createLangs($id)
	{
		global $db;
		$sql = "INSERT INTO langs (ru,".$this->lang_arr['page_lang'].") VALUES ('".$this->lang_arr['ru_id']."','".$id."')";
        $result = $db->query($sql);
    }

	public function createLocal($id,$main_post,$city_id)
	{
		global $db;

		$sql = "INSERT INTO langs (ru,main_post,city_id) VALUES ({$id},{$main_post},{$city_id})";
		$result = $db->query($sql);
	}

	public function createPageLang($sql)
	{
		global $db;

		$result = $db->query($sql);
		if( $result )
		{
			return $db->insert_id;
		}
	}

	public function check_post($city_id,$post_name,$url,$lang)
    {
        global $db;
        return Db::returnResults($db->query("SELECT id FROM dbi_posts 
                WHERE city_id = {$city_id} and post_name = '{$post_name}' and url='{$url}' and lang='{$lang}'")
        );
    }
	public function generateArrDataPage()
	{
		$page = [
			'post_name' => htmlspecialchars($this->lang_arr['page_name']),
			'url' => $this->lang_arr['page_url'],
			'type' => $this->lang_arr['page_type'],
			'lang' => $this->lang_arr['page_lang'],
			'city_id' => $this->lang_arr['city_id'],
			'date_cr' => date('Y-m-d H:i:s')
		];
		$sql = 'INSERT INTO dbi_posts ';
		$field_names_ar = array();
		$field_values_ar = array();
		foreach ( $page as $field_name => $field_value ) {
			$field_names_ar[] = $field_name;
			$sub = '';
			if( $field_name == 'post_name' || $field_name == 'url')
			{
				$sub = '-'.$this->lang_arr['page_lang'];
			}
			$field_values_ar[] = "'" . $field_value . $sub . "'";
		}
		$sql .= '(' . implode(', ',$field_names_ar) . ')' . ' VALUES ' . '(' . implode(', ',$field_values_ar) . ')';
		return $sql;

	}

	public function generateArrDataPageLocal()
	{
		$page = [
			'post_name' => htmlspecialchars($this->lang_arr['page_name']),
			'city_id' => $this->lang_arr['city_id'],
			'url' => $this->lang_arr['page_url'],
			'type' => $this->lang_arr['page_type'],
			'lang' => $this->lang_arr['page_lang'],
			'date_cr' => date('Y-m-d H:i:s')
		];
		$sql = 'INSERT INTO dbi_posts ';
		$field_names_ar = array();
		$field_values_ar = array();
		foreach ( $page as $field_name => $field_value ) {
			$field_names_ar[] = $field_name;
			$sub = '';
			if( $field_name == 'post_name' || $field_name == 'url')
			{
				$sub = '-'.$this->lang_arr['page_lang'];
			}
			$field_values_ar[] = "'" . $field_value . $sub . "'";
		}
		$sql .= '(' . implode(', ',$field_names_ar) . ')' . ' VALUES ' . '(' . implode(', ',$field_values_ar) . ')';
		return $sql;

	}
}