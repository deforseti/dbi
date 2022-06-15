<?php 
class MediaGalleryController
{
	public function actionMediaGallery()
	{
		
		if( isset($_POST['upload_img_to_media_gallery']) )
		{
			$errors = MediaCallery::uploadImages();
		}

		if( isset($_POST['remove_img_from_gallery']) )
		{
			$errors = MediaCallery::removeImage();
		}
	}
}