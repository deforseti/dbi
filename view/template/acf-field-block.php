<?php
if( isset($fields['ru_home_video_block']) && strlen($fields['ru_home_video_block'][0]) )
{
	?>
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