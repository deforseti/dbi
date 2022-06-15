<?php
class LoadScripts
{
	public static function loadCss($param='')
	{
		$home_css = 'view/css/home.css';
		$sorce = [
			'view/css/bootstrap.min.css',
			'view/css/CallMe.css',
			'view/css/dcverticalmegamenu.css',
			'view/css/likely.css',
			'view/css/pgwslider.min.css',
			'view/modules/OwlCarousel2/assets/owl.carousel.min.css',
			'view/modules/OwlCarousel2/assets/owl.theme.default.min.css',
			'view/css/style.css',
		];
		if( $param == 'home' )
		{
			array_unshift($sorce,$home_css);
		}
		$src = 'min/?f='.implode(',',$sorce);
		return $src;
	}
	public static function loadJs()
	{
		$sorce = [
			'view/js/jquery3.1.1.js',
			'view/js/CallMe.js',
			'view/js/jquery.dcverticalmegamenu.1.3.js',
			'view/js/jquery.hoverIntent.minified.js',
			'view/js/pgwslider.min.js',
			'view/js/likely.js',
			'view/modules/OwlCarousel2/owl.carousel.min.js',
			'view/js/js.js'
		];
		$src = 'min/?f='.implode(',',$sorce);
		return $src;
	}

	public static function including_header_style()
	{
		include('view/template/css_head.php');
	}
}