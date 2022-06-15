<?php
	$list_form = [
		'606',
		'607',
		'608',
		'609',
		'610',
		'611',
		'621',
		'622'
	];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<?php
			include_once('left_sidebar.php');
			?>
		</div>
		<div class="col-lg-9">
				<?php 
				if( is_array($metadata) )
				{
					echo '<div class="wrapp-prods animate_position">';
					foreach ($metadata as $key => $item ) {
						include('template/card_preview.php');
					}
					echo '</div>';
				}
				if( in_array($object['id'], $list_form) )
				{
					?>
						<div class="content-card animate_position">
					<?php
						require_once('template/form-online-zakaz/'.$object['id'].'.php');
					?>
						</div>
					<?php
				}
				if( strlen( $object['content']) )
				{
					?>
					<div class="content-card animate_position">
							
						<?=$object['content']?>
					</div>
					<?php
				}
					require_once('template/acf-field-block.php');
				?>
			</div>
		</div>
	</div>
</div>

