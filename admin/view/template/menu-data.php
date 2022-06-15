<?php 
      	$arr_structure = json_decode($metadata['menu_data']['relation_pages'],TRUE);
      	?>
      	
      	<form method="POST">
			<div class="col-lg-7">
				<div class="single-element nestable-wrapp">
			        <p class="title-singl-element title-block">Меню: <?=$metadata['menu_data']['menu_name']?> - <span style="color:lightblue;">язык [ <?=$metadata['menu_data']['lang']?> ]</span></p>
					<div class="dd relation-element-wrapp" id="nestable">
				    	<ol class="dd-list">
				    		<?php
				    		if( isset( $metadata['html_menu']) )
				    		{
				    			echo $metadata['html_menu'];
				    		}
				    		?>

				    		<!-- added item in menu -->
				    	    <?php 
				    	    	if( isset($_POST['relation_category']) && is_array($_POST['relation_category']) )
				    	    	{
				    	    		foreach ($_POST['relation_category'] as $key => $Ell) {
				    	    			$param_elem = explode('|||',$Ell);
				    	    			?>
											<li class="dd-item" data-id="<?=$param_elem[0]?>">
				    	        				<div class="dd-handle"><?=$param_elem[1]?><span class="remove_item_menu">Удалить<span></div>
				    	    				</li>
				    	    			<?php
				    	    		}
				    	    	}
				    	    ?>
				    	</ol>
					</div>
					<textarea id="nestable-output" name="structure_menu"></textarea>
					<input type="submit" class="btn btn-primary mt-20" name="save_structure_menu" value="Сохранить меню">
				</div>
			</div>
		</form>
      	<?php
