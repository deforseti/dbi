<?php
$media_gallery = new MediaGalleryController();
$media_gallery_errors = $media_gallery->actionMediaGallery();

$langController = new LangController();
$langController->actionLang();


if( isset($_POST) )
{
	$isset_btn = array_key_exists('upload_img_to_media_gallery',$_POST);
	if( $isset_btn )
	{
		header('Location:'. $_SERVER['REQUEST_URI']);
		exit;
	}
	
}

// save_ACF_DATA in option page
// id page = 600 
// lang ru
$acf_option_page = new ACF();
$post_id_acf = 0;
if( isset($_GET['post_id']))
{
	$post_id_acf = (int)$_GET['post_id'];

	$acf_option_page->init_ACF($post_id_acf,'save_ACF_DATA');

	// ACF on home page
	$acf_option_page->init_ACF($post_id_acf,'SAVE_ACF_FIELD_INIT_999');
}

