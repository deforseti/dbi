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
			'page_url' => $_POST['page_url']
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

	public function testLangInDb()
	{
		global $db;
		$data = $db->query("SELECT id FROM langs WHERE ru = '".$this->lang_arr['ru_id']."' ");
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

	public function createPageLang($sql)
	{
		global $db;
		
		$result = $db->query($sql);
		if( $result )
		{
			return $db->insert_id;
		}
	}

	public function generateArrDataPage()
	{
		$page = [
			'post_name' => htmlspecialchars($this->lang_arr['page_name']),
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