<?php
$field_names = array(
	'ru_home_video_block',
	'ru_home_name_block1',
	'ru_home_block1',
	'ru_home_name_block2',
	'ru_home_sub_name_block2',
	'ru_home_text_block2',
	'ru_home_4_elements_block2',
	'ru_home_name_block3',
	'ru_home_4el_block3',
	'ru_home_name_block4',
	'ru_home_cl_block4',
	'ru_home_consultation_bl1',
	'ru_home_consultation_bl2',
	'ru_home_consultation_bl3',
	'rmb_img_url'
);
$fields = Core::getACF((int)$_GET['post_id'],$field_names);
?>
<div class="container">
	<!-- rombs or circles on home -->
	<form method="POST">
		<div class="img-div-wrapp single-element">
			<div class="col-lg-12">
				<div class="single-element">
					<input type="hidden" name="count_arr_acf_field" value="2">
					<p class="title-singl-element title-block">Ромбы:</p>
					<?php
						for($i = 0; $i < 8; $i++)
						{
							?>
								<div class="row mt10">
									<div class="col-lg-5">
										<p class="title-singl-element">Url картинки:</p>
										<input type="text" class="form-control" name="rmb_img_url[]" value="<?=$fields['rmb_img_url'][$i][0]?>">
									</div>
									<div class="col-lg-2 num-rmb">
										<p class="title-singl-element title-block"><?=$i+1;?></p>
									</div>
									<div class="col-lg-5">
										<p class="title-singl-element">Ссылка на страницу:</p>
										<input type="text" class="form-control" name="rmb_img_url[]" value="<?=$fields['rmb_img_url'][$i][1]?>">
									</div>
								</div>

							<?php
							if( $i < 7 ){
								?>
									<hr>
								<?php
							}
						}
					?>
				</div>
			</div>
			<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
		</div>
	</form>
	<!-- end rombs or circles on home -->

	<!-- block video -->
	<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">Block video (url video):</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_video_block'][0]?>" name="ru_home_video_block[]">
				<hr>
				<p class="title-singl-element title-block">Block video (Текст):</p>    
				<textarea class="form-control" name="ru_home_video_block[]"><?=$fields['ru_home_video_block'][1]?></textarea>
				<hr>
				<p class="title-singl-element title-block">Block video (текст соцсетей):</p>    
				<textarea class="form-control" name="ru_home_video_block[]"><?=$fields['ru_home_video_block'][2]?></textarea>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
	</form>
	<!-- end block video -->
	<!-- block 1 -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">name Block1 (мы предлагаем вам):</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_name_block1']?>" name="ru_home_name_block1">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<form method="POST">
			<div class="single-element col-lg-12">
				<p class="title-singl-element title-block">Block1 (4 блока с фото и информацией):</p>
				<input type="hidden" name="count_arr_acf_field" value="7">
					<?php
						for($i=0;$i<4;$i++)
						{
							?>
								<div class="img-div-wrapp single-element col-lg-3">  
									<div class="col-lg-12">    
										<p class="title-singl-element">урл картинки:</p>    
											<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][0]?>" name="ru_home_block1[]">
									</div>
									<div class="col-lg-12">
										<hr>
										<p class="title-singl-element">aлт картинки:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][1]?>" name="ru_home_block1[]"> 
										<hr>
										<p class="title-singl-element">тайтл картинки:</p>
										<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][2]?>" name="ru_home_block1[]">
									</div>
									<div class="col-lg-12">
										<hr>
										<p class="title-singl-element">Заголовок под картинкой:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][3]?>" name="ru_home_block1[]"> 
										<hr>
										<p class="title-singl-element">цвет линии под заголовком:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][4]?>" name="ru_home_block1[]"> 
										<hr>
										<p class="title-singl-element">Текст под заголовком:</p>
										<textarea type="text" class="form-control" name="ru_home_block1[]"><?=$fields['ru_home_block1'][$i][5]?></textarea>
										<hr>
										<p class="title-singl-element">Ссылка:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_block1'][$i][6]?>" name="ru_home_block1[]">
										
									</div>
								</div>
							<?php
						}
					?>
					<hr>
					<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block 1 -->

		<!-- block 2 -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">name Block2 (чем мы лучше других):</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_name_block2']?>" name="ru_home_name_block2">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>

		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">sub name Block2:</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_sub_name_block2']?>" name="ru_home_sub_name_block2">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>

		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">text Block2:</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_text_block2']?>" name="ru_home_text_block2">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>

		<form method="POST">
			<div class="single-element col-lg-12">
				<p class="title-singl-element title-block">Block2:</p>
				<input type="hidden" name="count_arr_acf_field" value="3">
					<?php
						for($i=0;$i<4;$i++)
						{
							?>
								<div class="img-div-wrapp single-element col-lg-3">  
									<div class="col-lg-12">
										<p class="title-singl-element">Цвет круга:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_4_elements_block2'][$i][0]?>" name="ru_home_4_elements_block2[]"> 
										<hr>
										<p class="title-singl-element">Число:</p>
										<input type="text" class="form-control" value="<?=$fields['ru_home_4_elements_block2'][$i][1]?>" name="ru_home_4_elements_block2[]">
										<hr>
										<p class="title-singl-element">Текст:</p>
										<input type="text" class="form-control" value="<?=$fields['ru_home_4_elements_block2'][$i][2]?>" name="ru_home_4_elements_block2[]">
									</div>
								</div>
							<?php
						}
					?>
					<hr>
					<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block 2 -->

		<!-- block 3 -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">name Block3 (как мы работаем):</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_name_block3']?>" name="ru_home_name_block3">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>

		<form method="POST">
			<div class="single-element col-lg-12">
				<p class="title-singl-element title-block">Block3 (как мы работаем):</p>
				<input type="hidden" name="count_arr_acf_field" value="6">
					<?php
						for($i=0;$i<4;$i++)
						{
							?>
								<div class="img-div-wrapp single-element col-lg-3">  
									<div class="col-lg-12">    
										<p class="title-singl-element">урл картинки:</p>    
											<input type="text" class="form-control" value="<?=$fields['ru_home_4el_block3'][$i][0]?>" name="ru_home_4el_block3[]">
									</div>
									<div class="col-lg-12">
										<hr>
										<p class="title-singl-element">aлт картинки:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_4el_block3'][$i][1]?>" name="ru_home_4el_block3[]"> 
										<hr>
										<p class="title-singl-element">тайтл картинки:</p>
										<input type="text" class="form-control" value="<?=$fields['ru_home_4el_block3'][$i][2]?>" name="ru_home_4el_block3[]">
									</div>
									<div class="col-lg-12">
										<hr>
										<p class="title-singl-element">Заголовок под картинкой:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_4el_block3'][$i][3]?>" name="ru_home_4el_block3[]"> 
										<hr>
										<p class="title-singl-element">цвет линии под заголовком:</p>    
										<input type="text" class="form-control" value="<?=$fields['ru_home_4el_block3'][$i][4]?>" name="ru_home_4el_block3[]"> 
										<hr>
										<p class="title-singl-element">Текст под заголовком:</p>
										<textarea type="text" class="form-control" name="ru_home_4el_block3[]"><?=$fields['ru_home_4el_block3'][$i][5]?></textarea>
									</div>
								</div>
							<?php
						}
					?>
					<hr>
					<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block 3 -->

		<!-- block4 -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">name Block4(новые статьи):</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_name_block4']?>" name="ru_home_name_block4">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<form method="POST">

			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">name Block4(Цвет линии):</p>  
				<?php
			for($i = 0; $i<4; $i++)
			{
				?>
					<input type="text" class="form-control" value="<?=$fields['ru_home_cl_block4'][$i]?>" name="ru_home_cl_block4[]">
				<hr>
				<?php
			}
			?>  
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block4 -->

		<!-- block1 consultation -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">Блок консультации 1:</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_consultation_bl1']?>" name="ru_home_consultation_bl1">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block1 consultation-->

		<!-- block2 consultation -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">Блок консультации 2:</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_consultation_bl2']?>" name="ru_home_consultation_bl2">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block2 consultation-->

		<!-- block3 consultation -->
		<form method="POST">
			<div class="img-div-wrapp single-element col-lg-3">
				<p class="title-singl-element title-block">Блок консультации 3:</p>    
				<input type="text" class="form-control" value="<?=$fields['ru_home_consultation_bl3']?>" name="ru_home_consultation_bl3">
				<hr>
				<input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
			</div>
		</form>
		<!-- end block3 consultation-->
</div>


