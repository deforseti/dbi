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
        <?php if((int)$object['count_chield'] !== 0) :?>
			<div class="product_description text-context">
                <!--                price                       -->
                <?php if ((int)$item['sales'] > 0):?>
                <div class="col-lg-12">
                    <span style="float: left;"><s><?= $item['sales'] ?> ₴</s></span>
                </div>
                <div class="col-lg-12">
                    <span style="font-size: 20px;float: left;"><?= $item['price'] ?> ₴</span>
                    <span class="glyphicon glyphicon-shopping-cart" style="font-size: 20px;float: right;"></span>
                </div>
                <?php elseif($item['price']):?>
                <div class="col-lg-12">
                    <br>
                </div>
                <div class="col-lg-12">
                    <span style="font-size: 20px;float: left;"><?= $item['price'] ?> ₴</span>
                    <span class="glyphicon glyphicon-shopping-cart" style="font-size: 20px;float: right;"></span>
                </div>
                <?php endif;?>

                <!--                price-end                   -->
                <?php if (!empty($item['materials'])):?>
                    <div class="col-lg-12" style="font-size: 10px;float: left;">
                        <span style="font-size: 10px;float: left;">Материал :</span>
                        <span style="font-size: 10px;float: right;"><?= $metadata['filters']['lists']['materials'][$item['materials']]['name_'.$item['lang']]?></span>
                    </div>
                <?php endif;?>
			</div>
        <?php endif;?>
		</a>
	</div>