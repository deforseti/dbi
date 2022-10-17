<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<?php
			if ((int)$object['count_chield'] === 0 || (
			        empty($metadata['filters']['filter']) && empty($metadata['filters']['checkbox']))) {
			    include_once('left_sidebar.php');
            } else {
                include_once('product_filter_sidebar.php');
            }
			?>
		</div>
		<div class="col-lg-9">
			<?php 
			if( is_array($metadata['children_cats']) )
			{
				?>
				<div class="wrapp-prods animate_position">
					<?php
					foreach ($metadata['children_cats'] as $key => $item ) {
						include('template/card_preview.php');
					}
					?>
				</div>
				<?php
			}
			if( is_array($metadata['relation_prods']) )
			{
				?>
				<div class="wrapp-prods animate_position">
					<?php
					foreach ($metadata['relation_prods'] as $key => $item ) {
						include('template/card_preview.php');
					}
					?>
				</div>
				<?php
			}
			if( strlen( $object['content']) )
			{
				?>
					<div class="content-card">
						<?=$object['content']?>
					</div>
				<?php
			}
			require_once('template/acf-field-block.php');
		?>
		</div>
	</div>
</div>