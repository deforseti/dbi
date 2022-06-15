<?php
// var_dump($object);
?>
<div class="container wrapp_content">
	<div class="row">
		<div class="col-lg-12">
		<?php
			if( isset($metadata['menu_saved']) )
			{
				if( $metadata['menu_saved'] === true )
			{
				echo '<p class="alert-info alert-ok">Меню сохранено :)</p>';
			}
			elseif( $metadata['menu_saved'] === false )
			{
				echo '<p class="alert-info alert-error">Ошибка сохранения! :(</p>';
			}
			}
		?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="single-element">
				<p class="title-singl-element title-block">Меню сайта</p>
				<ul class="menu-names-item-list">
					<?php
						foreach ($metadata['menu_list'] as $key => $menu_item ) {

							?>
								<li>
									<?=$menu_item['menu_name']?>
									<?php
										foreach ($metadata['menu_list'] as $k => $item_m) {
											if( $item_m['menu_name'] == $menu_item['menu_name'] ){
												?>
													<a class="
													<?php
														if( $item_m['id'] == (int)$_GET['menu_id'])
														{
															echo 'curr_menu_lang ';
														}
													?>
													menu-lang-swich" href="?page=menu&menu_id=<?=$item_m['id']?>&lang=<?=$item_m['lang']?>"><?=$item_m['lang']?></a>
												<?php
											}
										}
									?>
								</li>
							<?php
							if( $key == 3 )
							{
								break;
							}
						}
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<form method="POST">
		<div class="col-lg-5">
			<?php
				if( is_array($object) )
				{
					foreach ($object as $key => $bl_type) {
						?>
						<div class="single-element">
							<p class="title-singl-element title-block"><?=$bl_type['name_block']?></p>
							<div class="input-group text-left relation-element-wrapp">
								<?php
									if( is_array($bl_type['list_elems']) )
									{
										foreach ($bl_type['list_elems'] as $k => $item ) {
											?>
												<p class="relation-element"> 
													<input type="checkbox" name="relation_category[]" id="relation_cat_<?=$item['id']?>" value="<?=$item['id']?>|||<?=$item['post_name']?>">
													<label for="relation_cat_<?=$item['id']?>"><?=$item['post_name']?></label>
												</p>
											<?php
										}
									}
								?>
							</div>
						</div>
						<?php
					}
				}
			?>
			<input type="submit" class="btn btn-primary" name="add_element_to_menu" value="Добавить в меню">
		</div>
		</form>
		<?php 
		if( isset($metadata['menu_data']) )
		{
			include_once('template/menu-data.php');
		}

		?>
</div>
</div>