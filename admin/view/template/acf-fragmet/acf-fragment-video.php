<?php
$field_names = [
	"ru_home_video_block"
];
$fields = Core::getACF($post_id_acf,$field_names);
?>
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