
<div class="single-element">
	<p class="title-singl-element title-block">Родительские страницы:</p>
	<div class="input-group text-left relation-element-wrapp">
	<?php
	if( $metadata['relation_categories'] )
	{
		foreach ( $metadata['relation_categories'] as $cat_key => $relation_category ) { 
			if( $relation_category['id'] == $object['id'])
			{
				continue;
			}
			?>
			<p class="relation-element"> 
				<input 
				<?php 
					$checked = '';
					if( isset($object['categories']) && strlen($object['categories']) > 3 )
					{
						$categories = json_decode($object['categories'],TRUE);
					}
					else
					{
						$categories = array();
					}
					
					if( in_array( $relation_category['id'], $categories ) )
					{
						$checked = 'checked';
					}
				?>
				type="checkbox" <?=$checked?> name="relation_category_to_post[]" id="relation_cat_<?=$relation_category['id']?>" value="<?=$relation_category['id']?>">
				<label for="relation_cat_<?=$relation_category['id']?>"><?=$relation_category['post_name']?></label>
			</p>
		<?php 
		}
	}
	?>
	</div>
</div>