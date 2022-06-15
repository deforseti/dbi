<div class="container wrapp_content">
	<div class="row">
		<div class="col-lg-10">
			<ul class="posts-structure-sortable">
				<?
				if( is_array($object) ){
				 foreach ($object as $key => $post ) { ?>
					<li data-post-id="<?=$post['id']?>" data-post-position="<?=$post['position']?>" class="ui-state-default">
						<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
						<a class="name_sortable_element" href="?page=singlorder&post_id=<?=$post['id']?>">
							<?=$post['u_name']?> (<?=$post['u_organization']?>) дата: <?=$post['u_date']?>
						</a>
						<a class="pull-right link-post-opt redact-link-color" href="?page=singlorder&post_id=<?=$post['id']?>">Подробнее о заказе</a>
					</li>
				<? } 
				}
				?>
			</ul>
		</div>
	</div>
</div>