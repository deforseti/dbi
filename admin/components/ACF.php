<?php
class ACF
{
	protected $db;
	protected $table_name = 'dbi_postmeta';
	public $clear_arr = array();
	public function init_ACF($page_id,$save_btn=false)
	{
		if( isset( $_POST[$save_btn] ) )
		{
			global $db;
			$this->db = $db;
			
			$division = 0;
			if( isset($_POST['count_arr_acf_field']) )
			{
				$division = (int)$_POST['count_arr_acf_field'];
			}
			unset($_POST[$save_btn],$_POST['count_arr_acf_field']);
			$name_field = key($_POST);
			if( $name_field )
			{
				$value = $this->dataParse($name_field,$division);
			
				$issetField = $this->issetField($page_id,$name_field);
				if( $issetField )
				{
					$this->updateACF($page_id,$name_field,$value);
				}else
				{
					$this->createACF($page_id,$name_field,$value);
				}
			}
		}
		
	}

	public function updateACF($page_id,$name_field,$value)
	{
		$sql = "UPDATE ".$this->table_name." SET meta_value = '".$value."' WHERE post_id = '".$page_id."' AND meta_key = '".$name_field."' ";
		$data = $this->db->query($sql);
		return $data;
	}

	public function createACF($page_id,$name_field,$value)
	{
		$sql = "INSERT INTO ".$this->table_name." (post_id, meta_key, meta_value) VALUES ('".$page_id."', '".$name_field."', '".$value."')";
		$data = $this->db->query($sql);
	}

	public function issetField($page_id,$name_field)
	{
		$sql = "SELECT id FROM ".$this->table_name." WHERE post_id = '".$page_id."' AND meta_key = '".$name_field."' ";
		$data = $this->db->query($sql);
		return $data->num_rows;
	}

	public function dataParse($name_field,$division)
	{
		$data_post = $_POST[$name_field];
		$data_post = self::clearDataACF($data_post);
		if( $division )
		{
			return json_encode( array_chunk($data_post,$division),JSON_UNESCAPED_UNICODE);
		}else
		{
			return json_encode($data_post,JSON_UNESCAPED_UNICODE );
		}
	}

	public static function clearDataACF(&$data)
	{
		if( is_array($data) )
		{
			foreach ($data as $key => &$v) {
				if( is_array($v) )
				{
					self::clearDataACF($v);
				}else
				{
					$v = htmlspecialchars($v,ENT_QUOTES);
				}
			}
		}else
		{
			$data = htmlspecialchars($data,ENT_QUOTES);
		}
		return $data;
	}

}