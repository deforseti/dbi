<?php
$img = json_decode($item['img_post'],TRUE);
?>
	<div class="right-card-menu opacityAnimate">
		<a href="<?=$item['url']?>">
			<div class="img-context">
				<img alt="<?=$img['alt']?>" title="<?=$img['title']?>" src="<?=Core::imgUrl($img['url'])?>">
			</div>
			<div class="text-context">
				<p class="" style="padding-top: 4.5px; font-size: 15px;"><?=$item['post_name']?></p>
			</div>
		</a>
	</div>