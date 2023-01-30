<?php
if (!headers_sent()) {
    header('Access-Control-Allow-Origin: *');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126221219-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-126221219-1');
		</script>
		<?php
			$titleStrpslash = stripcslashes($object['title']);
		?>
		<title><?=$titleStrpslash?></title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="yandex-verification" content="ee5952d8d1433b14" />
    	<meta name="description" content="<?=$object['description']?>" />

    	<meta property="og:image" content="https://dbi.com.ua/uploads/images/logo_dbi_none_bg.png" /> 
    	<meta property="og:title" content="<?=$titleStrpslash?>" />
    	<meta property="og:description" content="<?=$object['description']?>" />
    	<meta property="og:type" content="website" />

		<link rel="shortcut icon" href="/images/dbi_com_ua.png" type="image/png">
		<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
		<?php LoadScripts::including_header_style();?>
		<link rel="stylesheet" type="text/css" href="/<?=LoadScripts::loadCss($object['type'])?>">
        <?php if ($object['canonical']) { ?>
            <link rel="canonical" href="<?= $object['canonical']?>" />
        <?php } ?>
        <?php foreach($object['hreflangs'] as $key=>$obj) { ?>
            <link rel="alternate" href="<?= $obj?>" hreflang="<?= $key?>" />
        <?php } ?>
        <?php if (!empty($object['faq'])) : ?>
            <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "FAQPage",
                "mainEntity": "<?php print_r($object['faq']);?>"
            }
            </script>
        <?php endif;?>
        <script type="text/javascript">
            (function(c,l,a,r,i,t,y){
                c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
                t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
                y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
            })(window, document, "clarity", "script", "eumzxbdkeh");
        </script>
		<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '769121300201864');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=769121300201864&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	</head>
	<body unselectable="on">
<div class="header">
	<div class="container-fluid">
		<div class="row">
			<div itemscope itemtype="http://schema.org/Organization" class="col-lg-3 logo_dbi">
				<?php
					echo Core::logoСyclicLink();
				?>
			</div>
			<div class="col-lg-7 pl0 pr0 wrapp-head-content">
				<?php
					$initLangSwicher = new LangSwitcher();
					$initLangSwicher->echoSwicher($object['id'],$object['lang']);
				?>
				<div class="wrap-menu-a-search">
					<div id="nav-icon1">
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				<?php
				$init_menu->actionMenu('main-menu');
				?>
                <div class="row">
                    <div class="col-lg-10">
                        <form class="search-form" action="/" method="GET">
                            <i class="search-icon material-icons">search</i>
                            <input type="search" name="search" value="" placeholder="Введите фразу" required="required" >
                        </form>
                    </div>
                    <div>
                        <a href="#" style="font-size: 0.75vw; color: #000; text-decoration: none;}" id="city_modal" data-toggle="modal" data-target="#basicModal"><?= $object['current_city'] ?></a>
                    </div>
                </div>
                </div>
			</div>
			<div class="col-lg-2 block_contact">
				<ul>
					<li><a href="tel:<?=$fields_opt['google_map_script'][1]?>"><?=$fields_opt['google_map_script'][1]?></a></li>
					<li><a href="tel:<?=$fields_opt['google_map_script'][2]?>"><?=$fields_opt['google_map_script'][2]?></a></li> 
					<li><a href="mailto:<?=$fields_opt['google_map_script'][3]?>"><?=$fields_opt['google_map_script'][3]?></a></li> 
				</ul> 
			</div>
		</div>
	</div>
</div>
<?php 
	$breadcrumbs = new Breadcrumbs($object);
?>

