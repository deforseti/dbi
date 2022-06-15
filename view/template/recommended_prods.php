<?php
$img = json_decode($item['img_post'],TRUE);
?>
	<div class="right-card-menu opacityAnimate">
		<div name-prod="Запрос цены на продукт: <?=$item['post_name']?>." class="get_prise_recommended_prod">
			<div class="img-context">
				<img alt="<?=$img['alt']?>" title="<?=$img['title']?>" src="<?=Core::imgUrl($img['url'])?>">
			</div>
			<div class="text-context">
				<p class="" style="padding-top: 4.5px; font-size: 15px;"><?=$item['post_name']?></p>
			</div>
			<div class="wrp_get_price_prod"><span class="get_price_prod">Запросить цену</span></div>
		</div>
	</div>