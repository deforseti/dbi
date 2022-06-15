<?php
$field_names = [
	'online_order',
	'short_text_page',
	'accordeon_elm',
	'img_slider',
	'video_block_page',
	'recomended_prods',
	'rait_prod'
];
$fields = Core::getACF($object['id'],$field_names);
?>
	<div class="content-card">
		<?php 
			if( isset($fields['online_order']) ) {
				?>
					<div class="wrapp-btn-order row">
						<?php 
							if( !empty($fields['online_order'][0]) && strlen($fields['online_order'][0]) ) {
								?>
									<div class="col-lg-6">
										<a href="<?=$fields['online_order'][0]?>" class="calculate_input_value">Опросной лист</a>
									</div>
								<?php
							}
							if( !empty($fields['online_order'][0]) && strlen($fields['online_order'][1]) ) {
								?>
									<div class="col-lg-6">
										<a href="<?=$fields['online_order'][1]?>" class="calculate_input_value">Подбор оборудования онлайн</a>
									</div>
								<?php
							}
							?>
					</div>
				<?php
			}
			if( strlen($object['content']) || strlen($fields['short_text_page']) )
			{
				$img = json_decode($object['img_post'],TRUE);
				if( $object['id'] != 235 ) {
					?>
					<div class="prod_img_in_content">
						<img alt="<?=$img['alt']?>" title="<?=$img['title']?>" src="<?=Core::imgUrl($img['url'])?>">
						<div name-prod="Запрос цены на продукт: <?=$object['post_name']?>." class="tbForm_CallMe wrp_get_price_prod init_get_prise"><span class="get_price_prod">Запросить цену</span></div>
					</div>
				<?php
				}
				if( strlen($fields['short_text_page']) )
				{
					echo htmlspecialchars_decode($fields['short_text_page']);
				}else{
					
				}
				echo htmlspecialchars_decode($object['content']);
			}
		?>
	</div>
	<!-- accordeon -->
	<?php
		if( isset($fields['accordeon_elm']) && is_array($fields['accordeon_elm']) )
		{
			?>
				<div class="wrap-line-gradient"></div>
				<div class="accordeon">
					<?php
						foreach ($fields['accordeon_elm'] as $k => $txt) {
							?>
								<div class="accordion_title">
									<div><span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span><?=$txt['0']?></div>
									<div class="accordeon_text">
										<?=$txt['1']?>
									</div>
								</div>
							<?php
						}
					?>
				</div>
			<?php

		}
	?>
	<!-- slider -->

	<?php
	if(isset($fields['img_slider']) && is_array($fields['img_slider']) && strlen($fields['img_slider'][0][0]) )
	{
		?>
		<div class="wrap-line-gradient"></div>
		<div class="prod_slider_img">
		<h2 class="text-center artics_title text-uppercase">Изображения продукта</h2>
			<ul class="pgwSlider">
				<?php
					if( is_array($fields['img_slider']) )
					{
						foreach ($fields['img_slider'] as $k_sldr => $v_sldr) {
							?>
							<li><img title="<?=$v_sldr[2]?>" src="<?=$v_sldr[0]?>" alt="<?=$v_sldr[1]?>"></li>
							<?php
						}
					}
				?>
			</ul>
		</div>
		<?php
	}
	?>
	<!-- content prod -->
	<!-- <?php
	if( strlen($object['content']) )
	{
		?>
			<div class="wrap-line-gradient"></div>
				<div class="content-card mt0 style_pos">
					<?=$object['content']?>
				</div>
			
		<?php
	}
	?> -->

	<!-- video -->
	<?php
	if( isset($fields['video_block_page']) && strlen($fields['video_block_page'][0]) )
	{
		?>
			<div class="wrap-line-gradient"></div>
			<div class="video-wrapp">
				<div class="grey-overlay-scale"></div>
				<div class="col-lg-6 col-md-12 col-sm-12 pl0">
					<video loop="loop" autoplay="autoplay" muted="muted">
			 			<source src="<?=$fields['video_block_page'][0]?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
					</video>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12">
					<div class="content-video-bl">
						<div>
							<?=$fields['video_block_page'][1]?>
						</div>
					</div>
					<div class="wrapp_likely_db">
						<div class="likely likely-big likely-light likely-at-home">
							<p class="title-likely-at-home"><?=$fields['video_block_page'][2]?></p>
						  <div class="facebook"></div>
						  <div class="gplus"></div>
						  <div class="pinterest" data-media="/uploads/images/logo_dbi_none_bg.png"></div>
						  <div data-text="ООО Дунайбудивест" class="telegram"></div>
						  <div class="twitter"></div>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
	?>

	<!-- recommended prods -->
	<?php
		if( isset($fields['recomended_prods']) && strlen($fields['recomended_prods']) )
		{
			?>
				<div class="wrap-line-gradient"></div>
				<div class="prod_slider_img">
					<h2 class="text-center artics_title text-uppercase">С этим товаром так же интересуются</h2>
					<div class="wrap-recommended_prods animate_position">
					<?php
						global $db;
						$prds = $db->query("SELECT id,url,post_name,img_post FROM dbi_posts WHERE id IN (".trim($fields['recomended_prods']).")");
						$data_prods = Db::returnResults($prds,true);
						if( is_array($data_prods) )
						{
							foreach ($data_prods as $key => $item) {
								include('recommended_prods.php');
							}
						}
					?>
					</div>
				</div>
			<?php
		}
	?>
	<!-- rait -->
	
