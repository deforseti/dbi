<div id="mediaGallery" class="wrapp-modal-bg">
		<div class="container">
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<?php 
							if( $media_gallery_errors === true )
							{
								echo '<p class="alert-info alert-ok">Елемент(ы) загружен(ы)! :)</p>';
							}
							elseif( $media_gallery_errors === false )
							{
								echo '<p class="alert-info alert-error">Ошибка зашрузки! :(</p>';
							}
							
						?>
					</div>
				</div>
			<div class="row">
				<div class="col-lg-2">
					<h3>Медиа глерея</h3>
				</div>
				<div class="col-lg-8 wrapp-upload-form">
					<p class="text-center">Область загрузки изображений</p>
					<p class="text-center title-singl-element">файл должно иметь название с латинских букв и быть соответственного формата (png, jpeg, jpg, pdf, txt, doc ...)</p>
					<form method="post" enctype="multipart/form-data">
						<div class="col-lg-6">
							<input required="required" type="file" name="fileToUpload[]" id="fileToUpload" multiple>
						</div>
					    <div class="col-lg-6">
					    	<input type="submit" class="btn btn-primary" value="Загрузить изображение" name="upload_img_to_media_gallery">
					    </div>
					</form>
				</div>
				<div class="col-lg-2">
					<span data-open-popup="mediaGallery" class="pull-right close-modal">Закрыть галерею</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 img-body-wrapp">
					<? 
					if(is_array($imgs))
					{
						foreach ( $imgs as $k => $img ) { ?>
						<div class="wrapp-img">
							<img img_id_s="<?=$img['id']?>" src="<?=$dir.'/'.$img['name']?>">
							<p class="text-center"><?=$img['name']?></p>
						</div>
					<? } 
					}?>
				</div>
				<div class="col-lg-4 media-gallery-sidebar">
					<p>Cсылка на изображение:</p> 
					<p class="get_img_url"></p>
					<p><button class="copy_url_img btn btn-info">Скопировать ссылку на изображение</button></p>
					<hr>
					<p>Удаление изображения:</p>
					<p>
						<form method="POST">
							<input type="hidden" name="url_img_gallery_for_remove" value="">
							<input type="hidden" name="id_img_gallery_for_remove" value="">
							<input type="submit" onclick="return confirm('Удалить изображение?')" name="remove_img_from_gallery" class="btn btn btn-danger" value="Удалить изображение"></input>
						</form>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p>
						<form method=POST>
							<?php
								for($i=1;$i<=$pages;$i++) 
								{
									?>
										<button name="next_media_files" style="
											<? if($i == $curr_pg)
											{
												echo 'color:green;';
											}else
											{
												echo 'color:#000;';
											}
											?>
										" value="<?=$i?>"><?=$i?>
											
										</button>
									<?php
								}
							?>
						</form>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	openClosePopup($('.close-modal'),'none');
	openClosePopup($('.open-media-callery-btn'),'block');


	function openClosePopup($item,type)
	{
		$item.click(function(e){
			e.preventDefault();
			var modal_id = $(this).attr('data-open-popup');
			$('#' + modal_id ).css({'display':type});
		});
	}

	// get img url
	$('#mediaGallery .wrapp-img').click(function(){
		$url_img = $(this).find('img').attr('src');
		$('.get_img_url').text($url_img);
	});

	$('.copy_url_img').click(function(){
		copyToClipboard($('.get_img_url'));
	});

	function copyToClipboard(element) {
	  var $temp = $("<input>");
	  $("body").append($temp);
	  $temp.val($(element).text()).select();
	  document.execCommand("copy");
	  $temp.remove();
	}

	$('input[name="img_url"]').change(function(){
		var $src = $(this).val();
		$('.img_post_view img').attr('src', $src);
	});
</script>