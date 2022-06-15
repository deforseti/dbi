<?php
// id page options = 600
// lang ru
$field_names = array(
	'tel',
	'google_map_script',
	'adress_organization',
	'img_slider',
	'home_slider_title',
	'all_right_reserved',
	'img_brends',
	'brends_title',
	'send_email'
);
$fields = Core::getACF((int)$_GET['post_id'],$field_names);

?>
<div class="container wrapp_content">
	<div class="row">
		<div class="col-lg-4">
			<div class="single-element">
					<p class="title-singl-element title-block">Почта получения заявок</p>
					<p class="title-singl-element">Что бы подключить несколько почтовых ящиков, пропишите их через запятую</p>
					<form method="POST">
						<input class="form-control" required="required" name="send_email" value="<?=$fields['send_email']?>">
                  		<hr>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить">
					</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="single-element">
					<p class="title-singl-element title-block">Генератор сайтмап</p>
					<form method="POST">
						<input type="submit" class="btn btn-primary" name="generate_sitemap" value="Сгенерировать sitemap">
					</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="single-element">
					<p class="title-singl-element title-block">Контактные данные</p>
					<form method="POST">
                  		<textarea class="form-control" name="google_map_script[]"><?=$fields['google_map_script'][0]?></textarea>
                  		<hr>
                  		<textarea class="form-control" name="google_map_script[]"><?=$fields['google_map_script'][1]?></textarea>
                  		<hr>
                  		<textarea class="form-control" name="google_map_script[]"><?=$fields['google_map_script'][2]?></textarea>
                  		<hr>
                  		<textarea class="form-control" name="google_map_script[]"><?=$fields['google_map_script'][3]?></textarea>
                  		<hr>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить карту">
					</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="single-element">
					<p class="title-singl-element title-block">Адресс</p>
					<form method="POST">
                  		<textarea class="form-control" name="adress_organization"><?=$fields['adress_organization']?></textarea>
                  		<hr>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить карту">
					</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="single-element">
					<p class="title-singl-element title-block">Текст в футере</p>
					<form method="POST">
                  		<input type="text" class="form-control" name="all_right_reserved[]" value="<?=$fields['all_right_reserved'][0]?>">
                  		<hr>
                  		<input type="text" class="form-control" name="all_right_reserved[]" value="<?=$fields['all_right_reserved'][1]?>">
                  		<hr>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить">
					</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="single-element">
					<p class="title-singl-element title-block">Подпись слайдера</p>
					<form method="POST">
                  		<textarea class="form-control" name="home_slider_title"><?=$fields['home_slider_title']?></textarea>
                  		<hr>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить">
					</form>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="single-element">
					<p class="title-singl-element title-block">Слайдер на главной</p>
					<form method="POST">
						<div class="innerC-bl">
							<input type="hidden" name="count_arr_acf_field" value="3">
							<?php
								if( isset($fields['img_slider']) && is_array($fields['img_slider']) )
								{
									foreach ( $fields['img_slider'] as $img_slider ) {
										?>
										<div class="img-div-wrapp single-element col-lg-6">  
											<div class="col-lg-4">      
												<img style="width:100%;height:auto;" class="img-prev-slider" src="<?=$img_slider[0]?>">  
											</div>  
											<div class="col-lg-8">    
												<p class="title-singl-element">урл картинки:</p>    
												<input type="text" class="form-control src-img" value="<?=$img_slider[0]?>" name="img_slider[]">    
												<hr>    
												<div class="remove-slide-f">Удалить</div>  
											</div>  
											<div class="col-lg-12">  
												<hr>    
												<p class="title-singl-element">aлт картинки:</p>    
												<input type="text" class="form-control" value="<?=$img_slider[1]?>" name="img_slider[]">    
												<hr>   
												<p class="title-singl-element">тайтл картинки:</p>    
												<input type="text" class="form-control" value="<?=$img_slider[2]?>" name="img_slider[]">  
											</div>
										</div>
									<?php
									}
									
								}
							?>
						</div>
						<div data-name-input="img_slider" class="add-img-to-galery">
							Добавить изображение
						</div>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить слайдер">
					</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="single-element">
				<p class="title-singl-element title-block">Подпись бегущей строки брендов</p>
				<form method="POST">
                  	<input class="form-control" name="brends_title" type="text" value="<?=$fields['brends_title']?>" >
                  	<hr>
					<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить">
				</form>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="single-element">
					<p class="title-singl-element title-block">Бренды на главной</p>
					<form method="POST">
						<div class="innerC-bl">
							<input type="hidden" name="count_arr_acf_field" value="3">
							<?php
								if( isset($fields['img_brends']) && is_array($fields['img_brends']) )
								{
									foreach ( $fields['img_brends'] as $img_brends ) {
										?>
										<div class="img-div-wrapp single-element col-lg-6">  
											<div class="col-lg-4">      
												<img style="width:100%;height:auto;" class="img-prev-slider" src="<?=$img_brends[0]?>">  
											</div>  
											<div class="col-lg-8">    
												<p class="title-singl-element">урл картинки:</p>    
												<input type="text" class="form-control src-img" value="<?=$img_brends[0]?>" name="img_brends[]">    
												<hr>    
												<div class="remove-slide-f">Удалить</div>  
											</div>  
											<div class="col-lg-12">  
												<hr>    
												<p class="title-singl-element">aлт картинки:</p>    
												<input type="text" class="form-control" value="<?=$img_brends[1]?>" name="img_brends[]">    
												<hr>   
												<p class="title-singl-element">тайтл картинки:</p>    
												<input type="text" class="form-control" value="<?=$img_brends[2]?>" name="img_brends[]">  
											</div>
										</div>
									<?php
									}
									
								}
							?>
						</div>
						<div data-name-input="img_brends" class="add-img-to-galery">
							Добавить изображение
						</div>
						<input type="submit" class="btn btn-primary" name="save_ACF_DATA" value="Сохранить слайдер">
					</form>
			</div>
		</div>
	</div>
</div>