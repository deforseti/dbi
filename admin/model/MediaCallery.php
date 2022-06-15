<?php

class MediaCallery
{
	public static function mediaGalerryPopup($media_gallery_errors){
		$dir = '../uploads/imgs';
		global $db;
		$curr_pg = self::pg_currMedia();
		$limit = 20;
		
		$last = $curr_pg * $limit;
		$start = $last - $limit;
		$num_media = self::pagiMedia($curr_pg);
		$pages = ceil($num_media / $limit);

		$imgs_d = $db->query("SELECT * FROM dbi_media ORDER BY id DESC LIMIT ".$start.",".$last." ");
		$imgs = Db::returnResults($imgs_d,true);
		include_once(ROOT.'/view/template/media-gallery.php');
	}
	static public function pg_currMedia()
	{
		if(isset($_POST['next_media_files']) )
		{
			$curr_pg = (int)$_POST['next_media_files'];
		}else{
			$curr_pg = 1;
		}
		return $curr_pg;
	}
	static public function pagiMedia($pg){
		global $db;
		$count_rows = $db->query("SELECT count(*) FROM dbi_media");
		$count = Db::returnResults($count_rows);
		return $count['count(*)'];
	}

	public static function uploadImages()
	{
		// Set Upload Path
		$target_dir = '../uploads/imgs/';
		if( isset($_FILES['fileToUpload']['name'])) { 
		  $total_files = count($_FILES['fileToUpload']['name']);
		  for($key = 0; $key < $total_files; $key++) {
		    // Check if file is selected
		    if(isset($_FILES['fileToUpload']['name'][$key]) && $_FILES['fileToUpload']['size'][$key] > 0) {
		      $original_filename = $_FILES['fileToUpload']['name'][$key];
		      $target = $target_dir . basename($original_filename);
		      $tmp  = $_FILES['fileToUpload']['tmp_name'][$key];
		      $errors = move_uploaded_file($tmp, $target);
		      if( $errors )
		      {
		      	self::addImg($original_filename);
		      }
		      return $errors;
		    } 
		  }
		}
	}

	public static function removeImage()
	{
		$url_img = $_POST['url_img_gallery_for_remove'];
			if( file_exists($url_img) )
			{
				$r_id = (int)$_POST['id_img_gallery_for_remove'];
				$sql = "DELETE FROM dbi_media WHERE id = '".$r_id ."' ";
				global $db;
				$db_remove = $db->query($sql);
				
				if( $db_remove )
				{
					$removed = unlink($url_img);
					return $removed; 
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
	}

	public static function addImg($img_name)
	{
		global $db;
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO dbi_media (name, date_t) VALUES ('".$img_name."', '".$date."')";
		$result = $db->query($sql);
	}
}