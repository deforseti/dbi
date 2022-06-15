<?php
if (strlen($fields['ru_home_video_block'][0] ) )
{
	?>
	<div class="wrap-line-gradient revers_gradient"></div>
	<div class="container-fluid animate_position">
		<div class="video-wrapp row opacityAnimate">
			<div class="grey-overlay-scale"></div>
			<div class="col-lg-6 col-md-12 col-sm-12 pl0">
				<video loop="loop" autoplay="autoplay" muted="muted">
		 			<source src="<?=$fields['ru_home_video_block'][0]?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
				</video>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="content-video-bl">
					<div>
						<?=$fields['ru_home_video_block'][1]?>
					</div>
				</div>
				<div class="wrapp_likely_db">
					<div class="likely likely-big likely-light likely-at-home">
						<p class="title-likely-at-home"><?=$fields['ru_home_video_block'][2]?></p>
					  <div class="facebook"></div>
					  <div class="gplus"></div>
					  <div class="pinterest" data-media="/uploads/images/logo_dbi_none_bg.png"></div>
					  <div data-text="ООО Дунайбудивест" class="telegram"></div>
					  <div class="twitter"></div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<?php
}
?>


<div class="wrap-line-gradient revers_gradient"></div>
<?php
	if( isset($fields['ru_home_name_block1']) && strlen($fields['ru_home_name_block1']) )
	{
		?>
			<div class="container-fluid services-wrp bg_drk">
				<div class="animate_position">
					<h3 class="opacityAnimate"><?=$fields['ru_home_name_block1']?></h3>
				</div>
				<div class="container-fluid wrapp-item-services animate_position">
					<?php 
						if( is_array($fields['ru_home_block1'] ) )
						{
							foreach ($fields['ru_home_block1'] as $k => $bl1_v) {
								?>
									<div class="scaleAnimation">
										<a href="<?=$bl1_v[6]?>">
											<img alt="<?=$bl1_v[1]?>" title="<?=$bl1_v[2]?>" src="<?=$bl1_v[0]?>">
										</a>
										<div class="service-description">
											<a href="<?=$bl1_v[6]?>">
												<?=$bl1_v[3]?>
											</a>
											<div class="bord_bottom_text" style="background: <?=$bl1_v[4]?>"></div>
										</div>
										<?=$bl1_v[5]?>
										<!-- <ul>
											<li>some text item l</li>
										</ul> -->
									</div>
								<?php
							}
						}
					?>
				</div>
				</div>

		<?php
	}
?>
			

<div class="container-fluid feedback_bl bg_whrt animate_position">
	<h3 class="fedb-h3 moveFromRightAnimate"><?=$fields['ru_home_consultation_bl1']?></h3>
	<button class="tbForm_CallMe connect-fdb scaleAnimation"><span>Связаться</span></button>
</div>
<?php
// block 2
if( $fields['ru_home_name_block2'] )
{
	?>
	<div class="container-fluid services-wrp about_us_shrt bg_drk animate_position">
		<h3 class="opacityAnimate"><?=$fields['ru_home_name_block2']?></h3>
		<div class="wrapp-about_us">
			<div class="bl_title_abut moveFromRightAnimate">
				<?=$fields['ru_home_sub_name_block2']?>
			</div>
			<div class="bl_text_abut opacityAnimate">
				<?=$fields['ru_home_text_block2']?>
			</div>
			<div class="itm_abut_el">
				<?php
					if( is_array($fields['ru_home_4_elements_block2']) )
					{
						foreach ($fields['ru_home_4_elements_block2'] as $kbl2 => $bl2_el ) {
							?>
								<div class="scaleAnimation">
									<div style="border-color: <?=$bl2_el[0]?>" class="f_persent_true"><span><?=$bl2_el[1]?></span></div>
									<div><?=$bl2_el[2]?></div>
								</div>
							<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	<?php
}
// block 3
if( strlen($fields['ru_home_name_block3']) )
{
	?>
		<div class="container-fluid services-wrp bg_whrt animate_position">
			<h3 class="moveFromRightAnimate"><?=$fields['ru_home_name_block3']?></h3>
			<div class="wrapp-item-services">
				<?php
					if( is_array($fields['ru_home_4el_block3']) )
					{
						foreach ($fields['ru_home_4el_block3'] as $k_bl3 => $vbl3_el) {
							?>
							<div class="scaleAnimation">
								<img alt="<?=$vbl3_el[1]?>" title="<?=$vbl3_el[2]?>" src="<?=$vbl3_el[0]?>">
								<div class="service-description">
									<?=$vbl3_el[3]?>
									<div class="bord_bottom_text" style="background: <?=$vbl3_el[4]?>"></div>
								</div>
								<div class="sub_text_elem">
										<?=$vbl3_el[5]?>
									</div>
							</div>
						<?php
						}
					}
				?>
			</div>
		</div>
	<?php
}
if( strlen($fields['ru_home_consultation_bl2']) )
{
	?>
	<div class="container-fluid feedback_bl bg_drk inline_element_v animate_position">
		<h3 class="fedb-h3 moveFromRightAnimate"><?=$fields['ru_home_consultation_bl2']?>
			<svg width="58" height="24" viewBox="5 6 19 10"><path fill="#fff" d="M24 11.871l-5-4.871v3h-19v4h19v3z"></path></svg>
		</h3>
		<button class="tbForm_CallMe connect-fdb scaleAnimation"><span>Связаться</span></button>
	</div>
<?php
}
if( strlen($fields['ru_home_name_block4']) )
{
	$sql_str = "SELECT url,img_post,post_name FROM dbi_posts WHERE parent = '202' ORDER BY id DESC LIMIT 4";
	$last4Posts = Core::GetFromDb($sql_str,true);
	?>
	<div class="services-wrp container-fluid bg_whrt animate_position">
		<div class="last_posts wrapp-item-services ">
			<h3 class="opacityAnimate"><?=$fields['ru_home_name_block4']?></h3>
			<?php
				if( is_array($last4Posts) )
				{
					foreach ($last4Posts as $k_lp => $v_last_post) {
						$img_l_p = json_decode($v_last_post['img_post'],TRUE);
						?>
						<div class="scaleAnimation">
							<a href="<?=$v_last_post['url']?>">
							<img alt="<?=$img_l_p['alt']?>" title="<?=$img_l_p['title']?>" src="<?=Core::imgUrl($img_l_p['url'])?>">
							</a>
							<div class="service-description">
								<a href="<?=$v_last_post['url']?>">
									<?=$v_last_post['post_name']?>
								</a>
								<div class="bord_bottom_text" style="background: <?=$fields['ru_home_cl_block4'][$k_lp]?>;"></div>
							</div>
						</div>
					<?php
					}
				}
			?>
		</div>
	</div>
	<?php
}

if( strlen($fields['ru_home_consultation_bl3']) )
{
	?>
		<div class="services-wrp container-fluid bg_drk">
			<h3><?=$fields['ru_home_consultation_bl3']?></h3>
			<div class="container form-home">
				<form method="POST">
					<div class="row">
						<div class="col-lg-6 ">
								<input type="text" placeholder="Имя*" required="required" name="u_name" value="">
						</div>
						<div class="col-lg-6">
							<input type="text" type="email" placeholder="Email*" required="required" name="u_email" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<textarea name="u_text" placeholder="Сообщение"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div id="grecapcha_home"></div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<input disabled="disabled" type="submit" name="send_from_dbi" value="Отправить">
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php
}
?>