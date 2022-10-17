<?php
	if( isset($object['id']) )
	{
		$field_names = array(
			'ru_home_video_block',
			'ru_home_name_block1',
			'ru_home_block1',
			'ru_home_name_block2',
			'ru_home_sub_name_block2',
			'ru_home_text_block2',
			'ru_home_4_elements_block2',
			'ru_home_name_block3',
			'ru_home_4el_block3',
			'ru_home_name_block4',
			'ru_home_cl_block4',
			'ru_home_consultation_bl1',
			'ru_home_consultation_bl2',
			'ru_home_consultation_bl3',
			'rmb_img_url'
		);
		$fields = Core::getACF($object['id'],$field_names);
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4 pr0">
				<?php
					if( is_array($fields['rmb_img_url']) )
					{
						include_once('template/circle_categories.php');
					}
				?>
		</div>
		<div class="col-lg-8 animate_position">
			<?php 
			if( is_array($metadata['left_menu']) )
			{
				foreach ($metadata['left_menu'] as $key => $item ) {
					include('template/card_preview.php');
				}
			}

			?>
		</div>
		</div>
	</div>
	<?php
		if( is_array($fields_opt['img_brends']) && strlen($fields_opt['img_brends'][0][0]) )
		{
			?>
				<div class="wrap-line-gradient"></div>
				<div class="container-fluid brends_move_line">
					<div class="row row1_tm pr0 pl0">
						<?php
							if( strlen($fields_opt['brends_title']) )
							{
								?>
									<h2 class="text-center text-uppercase"><?=$fields_opt['brends_title']?></h2>
								<?php
							}
						?>
        		<div class="owl-carousel">
        		<?php
					foreach ( $fields_opt['img_brends'] as $k_brend => $brend ) {
						?>
							<div class="item">
								<img class="img_s" src="<?=$brend[0]?>" alt="<?=$brend[1]?>" title="<?=$brend[2]?>">
							</div>
						<?php
					}
					?>
        		</div>
					</div>
				</div>
			<?php
		}
	?>
	<div class="wrap-line-gradient"></div>
	<div class="container-fluid animate_position">
		<div class="row row1_tm opacityAnimate">
			<h2 class="text-center text-uppercase"><?=$fields_opt['home_slider_title']?></h2>
		</div>
	</div>
	<div class="container-fluid animate_position">
		<div class="row opacityAnimate">
			<ul class="pgwSlider">
				<?php
					if( is_array($fields_opt['img_slider']) )
					{
						foreach ($fields_opt['img_slider'] as $k_sldr => $v_sldr) {
							?>
							<li><img title="<?=$v_sldr[2]?>" src="<?=$v_sldr[0]?>" alt="<?=$v_sldr[1]?>"></li>
							<?php
						}
					}
				?>
			</ul>
		</div>
	</div>

	<?php
		include_once('template/home_block.php');
	?>

			<div class="wrap-line-gradient revers_gradient"></div>
	
	<div class="container-fluid">
		<div class="row row1_tm">
			<div>
				<h1 class="text-center text-uppercase"><?=$object['post_name']?></h1>
			</div>
			<div>
				<?=$object['content']?>
			</div>
		</div>
	</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div >
    <form action="/regionality">
        <input name="cur_city" value="kyiv">
        <button type="submit">отправить</button>
    </form>
</div>