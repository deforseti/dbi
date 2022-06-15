<?php
$rait = 5;
if( isset($fields['rait_prod']) && (float)$fields['rait_prod'] )
{
	$rait = $fields['rait_prod'];
	$true_str = '<span class="rait_star_ glyphicon glyphicon-star" aria-hidden="true"></span>';
	$false_str = '<span class="rait_star_ glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
	?>
		<div class="rait_prod_block">
			<?php
				if( $rait > 0 )
				{
					for($i = 1; $i <= 5; $i++)
					{
						if( $i <= $rait )
						{
							echo $true_str;
						}else
						{
							echo $false_str;
						}
					}
				}
        ?>
        <!-- <span>Рейтинг: <?=$rait?></span> -->
		</div>
	<?php
}
?>
<?php
              $organization = $_SERVER['SERVER_NAME'];
              $url_img = Core::imgUrl($img['url']);
              $url_publisher = $organization . '/uploads/images/logo_dbi_none_bg.png';
              $url = $organization . '/' . $object['url'];
              $date_create = $object['date_cr'];
              $date_modify = $object['date_md'];
            ?>
               <script type="application/ld+json">
                {
                  "@context": "http://schema.org",
                  "@type": "Article",
                  "mainEntityOfPage": {
                  "@type": "WebPage",
                  "@id": "<?=$url?>"
                  },
                  "headline": "<?=$post->post_title?>",
                  "image": {
                    "@type": "ImageObject",
                    "url": "<?=$url_img?>",
                    "height":"150",
                    "width":"150"
                  },
                  "datePublished": "<?=$date_create?>",
                  "dateModified": "<?=$date_modify?>",
                  "author": {
                  "@type": "Person",
                  "name": "<?=$organization?>"
                  },
                  "aggregateRating": {
                  "@type": "AggregateRating",
                  "ratingValue": "<?=$rait?>",
                  "reviewCount": "<?=$object['id']?>",
                  "bestRating": "5",
                  "worstRating": "1"
                  },
                  "publisher": {
                  "@type": "Organization",
                  "name": "<?=$organization?>",
                  "logo": {
                  "@type": "ImageObject",
                  "url": "<?=$url_publisher?>"
                  }
                }
                }
                </script>  