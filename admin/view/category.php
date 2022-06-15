<div class="container wrapp_content">
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
				<?php
					Category::categoryTemplateTree($object);
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
</div>