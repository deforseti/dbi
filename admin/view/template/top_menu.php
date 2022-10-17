<div class="bg-color-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="nav nav-pills">
					<li role="presentation" <? if( $template == 'option' ){ echo 'class="active"';}?>>
						<a href="?page=option&post_id=600">Настройки</a>
					</li>
				<?php foreach ($route as $k => $r ) { ?>
					<li role="presentation" <? if( $k == $template ){ echo 'class="active"';}?> >
						<a href="?page=<?=$k?>"><?=$r?></a>
					</li>
					<?php } ?>
					<li <?php if( $template == 'singlpage-create' ){ echo 'class="active"';} ?> role="presentation">
						<a class="bg-green" href="?page=singlpage">Создать продукт</a>
					</li>
					<li <?php if( $template == 'singlcategory-create' ){ echo 'class="active"';} ?> role="presentation">
						<a class="bg-green" href="?page=singlcategory">Создать категорию</a>
					</li>
					<li role="presentation">
						<a class="bg-blue preventDefault" href="#">Другие страницы</a>
						<ul>
							<li><a href="?page=generalpage">Общие страницы</a></li>
							<li><a href="?page=singlgeneralpage">Создать общую страницу</a></li>
						</ul>
					</li>
					<li>
						<a href="?page=order">Ваши заказы</a>
					</li>
					<li role="presentation">
						<a class="bg-fiolet open-media-callery-btn" data-open-popup="mediaGallery" href="#">Meдиа галерея</a>
					</li>
				</ul>
			</div>
		</div>
        <?php $test_lang = new LangSwitcher();?>
		<div class="row lang-panel">
			<div class="col-lg-2">
				<?php
					$test_data = $test_lang->initLangSwicher($object);
                ?>
			</div>
            <div class="col-lg-12">
                <?php if($metadata['cities_url']) $test_lang->switcherLocal($test_data);?>
            </div>
			<div class="col-lg-6 relation-lang">

			</div>
		</div>
	</div>
</div>
<div class="media_library_fixed_pos open-media-callery-btn"  data-open-popup="mediaGallery" title="Медиа библиотека">M@</div>