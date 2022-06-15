<div class="wrp_for_small animate_position">
	<div class="wrap_circle_cat">
		<?php
			for($i=0; $i<6; $i++)
			{
				?>
					<a class="elem_corcle_cat opacityAnimate" href="<?=$fields['rmb_img_url'][$i][1]?>">
						<img src="<?=Core::imgUrl($fields['rmb_img_url'][$i][0])?>">
					</a>
				<?php
			}
		?>
	</div>
	<!-- small little circle category -->
	<div class="wrapp-small-cat">
		<a href="<?=$fields['rmb_img_url'][6][1]?>" class="elem_corcle_cat small-cat">
			<img src="<?=Core::imgUrl($fields['rmb_img_url'][6][0])?>">
		</a>
	</div>
	<div class="wrapp-small-cat">
		<a href="<?=$fields['rmb_img_url'][7][1]?>" class="elem_corcle_cat small-cat">
			<img src="<?=Core::imgUrl($fields['rmb_img_url'][7][0])?>">
		</a>
	</div>
</div>