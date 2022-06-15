<div class="container wrapp_content">
	<div class="row">
		<div class="col-lg-12">
			<p class="orderDate">Дата: <span><?=$object['u_date']?></span></p>
		</div>
		<div class="col-lg-12 wrapp-online-zakaz">
			<?=htmlspecialchars_decode($object['html_page']);?>
		</div>
		
	</div>
	<div class="row">
		<div class="col-lg-12">
			<button class="screenShotOrder">Загрузить заказ</button>
		</div>
	</div>
</div>
