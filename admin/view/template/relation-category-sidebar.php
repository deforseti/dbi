
<div class="single-element">
	<p class="title-singl-element title-block">Родительские категории:</p>
	<p class="title-singl-element">Если категория есть родительской текущей категории, она будет исключена из списка привязки дочерних категорий!</p>
	<div class="input-group text-left relation-element-wrapp">
		<p class="relation-element"> 
			<input
			type="radio" name="relation_category" id="relation_cat_0?>" value="0">
			<label for="relation_cat_0?>">Без родителя</label>
		</p>
	<?php
	if( $metadata['relation_categories'] )
	{
		$count = 0;
		SinglCategory::echoRelationCategory($metadata['relation_categories'],$count,$object);
	}
	?>
	</div>
</div>