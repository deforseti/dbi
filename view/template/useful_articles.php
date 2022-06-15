<h2 class="artics_title text-center">Полезная информация</h2>
<div class="useful-articles">
	<?php
		global $db;
		$sql_str = "SELECT url,img_post,post_name FROM dbi_posts WHERE parent = '202' ORDER BY id DESC LIMIT 4";
		$last4Posts = Core::GetFromDb($sql_str,true);
		if( is_array($last4Posts) )
		{
			foreach ($last4Posts as $k_lp => $v_last_post) {
				$img_l_p = json_decode($v_last_post['img_post'],TRUE);
				?>
				<a class="u-articles" href="<?=$v_last_post['url']?>">
					<img alt="<?=$img_l_p['alt']?>" title="<?=$img_l_p['title']?>" src="<?=Core::imgUrl($img_l_p['url'])?>">
					<div class="service-description">
						<?=$v_last_post['post_name']?>
					</div>
				</a>
			<?php
			}
		}
	?>
</div>