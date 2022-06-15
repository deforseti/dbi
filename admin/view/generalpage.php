<?php
require_once('category.php');
?>
<!-- <div class="container wrapp_content">
	<div class="row">
		<div class="col-lg-12">
		<?php 
			if( $metadata['position_element'] === true )
			{
				echo '<p class="alert-info alert-ok">Позиции сохранены :)</p>';
			}
			elseif( $metadata['position_element'] === false )
			{
				echo '<p class="alert-info alert-error">Ошибка сохранения! :(</p>';
			}
			
		?>
		</div>
		<div class="col-lg-10">
			<ul class="posts-structure-sortable">
				<?
				if( is_array($object) ){
				 foreach ($object as $key => $post ) { ?>
					<li data-post-id="<?=$post['id']?>" data-post-position="<?=$post['position']?>" class="ui-state-default">
						<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
						<a class="name_sortable_element" href="?page=singlgeneralpage&post_id=<?=$post['id']?>"><?=$post['post_name']?></a>
						<a class="pull-right link-post-opt redact-link-color" href="?page=singlgeneralpage&post_id=<?=$post['id']?>">Редактировать</a>
						<a onclick="return confirm('Удалить елемент?')" class="pull-right link-post-opt remove-link-color" href="?page=singlgeneralpage&remove_post=<?=$post['id']?>">Удалить</a>
						
					</li>
				<? } 
				}
				?>
			</ul>
		</div>
		<div class="col-lg-2">
			<form method="POST">
				<input type="hidden" name="sortable_element">
				<input type="submit" class="btn btn-primary" name="save_element_position" value="Сохранить позиции">
			</form>
		</div>
		
		
	</div>
</div> -->