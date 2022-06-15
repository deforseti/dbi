<?php 
$init_menu = new MenuController();


// get ACF

$fields_opt_name = array(
	'img_slider',
	'home_slider_title',
	'google_map_script',
	'adress_organization',
	'all_right_reserved',
	'img_brends',
	'brends_title'
);
$option_page = [
	'ru' => 600,
	'uk' => 0,
	'en' => 0
];
global $LANG;
$fields_opt = Core::getACF($option_page[$LANG],$fields_opt_name);
