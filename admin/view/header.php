<!DOCTYPE html>
<html>
<head>
	<title>admin dbi</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	<?php
	AutoconnectCssJsController::actionAutoconnectCss();

	// init visual editor
	if( isset($_GET['page']) && ( preg_match('/singl/', $_GET['page']) || $_GET['page'] == 'home'  ) )
	{
		?>
			<!-- jQuery and jQuery UI -->
	<script src="view/module/elrte-1.3/js/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="view/module/elrte-1.3/js/jquery-ui-1.8.13.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="view/module/elrte-1.3/css/smoothness/jquery-ui-1.8.13.custom.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE -->
	<script src="view/module/elrte-1.3/js/elrte.full.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="view/module/elrte-1.3/css/elrte.min.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE translation messages -->
	<script src="view/module/elrte-1.3/js/i18n/elrte.ru.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript" charset="utf-8">
		njW = jQuery.noConflict(true);
		njW(document).ready(function() {
			var opts = {
				cssClass : 'el-rte',
				lang     : 'ru',
				height   : 450,
				toolbar  : 'complete',
				allowTextNodes : false,
				cssfiles : ['view/module/elrte-1.3/css/elrte-inner.css']
			}
			var opts_min = {
				cssClass : 'el-rte',
				lang     : 'ru',
				height   : 150,
				toolbar  : 'complete',
				allowTextNodes : false,
				cssfiles : ['view/module/elrte-1.3/css/elrte-inner.css']
			}
			njW('#editor').elrte(opts);
			njW('#editor-short-text').elrte(opts_min);
		})
	</script>
		<?php
	}
	?>


</head>

<body>
	<?php 
		include_once( ROOT . '/view/template/top_menu.php' );
	?>