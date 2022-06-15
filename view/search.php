<div class="container-fluid search-page">
	<div class="row">
		<div class="col-lg-3">
			<?php
			include_once('left_sidebar.php');
			?>
		</div>
		<div class="col-lg-9 content-card">
			<h1>Поиска по запросу: <strong>"<?=$object['request']?>"</strong></h1>
			<?php 
				if( is_array($object['result_search']) && count($object['result_search']) )
				{
					echo '<ul>';
							foreach ($object['result_search'] as $k => $v) {
								echo '<li><a href="'.$v['url'].'">'.$v['post_name'].'</a></li>';
							}
					echo '</ul>';
				}
			?>
		</div>
	</div>
</div>