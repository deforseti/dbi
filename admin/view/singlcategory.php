
<form method="POST">
	<div class="container wrapp_content">
		<div class="row">
			<div class="col-lg-12">
				<?php 
					if( $metadata['errors_post'] === true )
					{
						echo '<p class="alert-info alert-ok">Сохранено! :)</p>';
					}
					elseif( $metadata['errors_post'] === false )
					{
						echo '<p class="alert-info alert-error">Ошибка сохранения! :(</p>';
					}	
				?>
			</div>
			<div class="col-lg-8">
				<div class="single-element">
					<p class="title-singl-element title-block">Название:</p>
					<input required="required" type="text" class="form-control" value="<?=$object['post_name']?>" name="post_name">
				</div>
				
				<div class="single-element">
					<p class="title-singl-element title-block">Ссылка поста:</p>
					<p class="title-singl-element">Продублируйте название поста, скрипт сам сделает транслейт!</p>
					<input type="text" class="form-control" value="<?=$object['url']?>" name="post_url">
				</div>
				<div class="single-element">
					<p class="title-singl-element title-block">Мета СЕО:</p>
					<p class="title-singl-element">тайтл:</p>
					<textarea type="text" class="form-control" name="post_title"><?=$object['title']?></textarea>
					<hr>
					<p class="title-singl-element">дескрипшин:</p>
					<textarea type="text" class="form-control" name="post_description"><?=$object['description']?></textarea>
					<hr>
					<p class="title-singl-element">кейвордс:</p>
					<textarea type="text" class="form-control" name="post_keywords"><?=$object['keywords']?></textarea>
                    <hr>
                    <p class="title-singl-element">каноникал:</p>
                    <input type="text" class="form-control" name="post_canonical" value="<?=$object['canonical']?>">
				</div>
				<div class="single-element">
					<p class="title-singl-element title-block">Контент поста:</p>
					<textarea id="editor" type="text" class="form-control" name="post_content"><?=stripcslashes($object['content'])?></textarea>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-element sidebar">
					<?php
					$img_post['url'] = '';
					$img_post['title'] = '';
					$img_post['alt'] = '';
					if( strlen( $object['img_post'] ) > 0 )
					{
						$img_post_r = json_decode(stripcslashes($object['img_post']),TRUE);
						$img_post['url'] = $img_post_r['url'];
						$img_post['title'] = $img_post_r['title'];
						$img_post['alt'] = $img_post_r['alt'];
					}
					?>
					<p class="title-singl-element title-block">Изображение:</p>
					<div class="img_post_view">
						<img src="<?=$img_post['url']?>">
					</div>
					<p class="title-singl-element">урл картинки:</p>
					<input type="text" class="form-control" value="<?=$img_post['url']?>" name="img_url">
					<hr>
					<p class="title-singl-element">альт картинки:</p>
					<input type="text" class="form-control" value="<?=$img_post['alt']?>" name="img_alt">
					<hr>
					<p class="title-singl-element">тайтл картинки:</p>
					<input type="text" class="form-control" value="<?=$img_post['title']?>" name="img_title">
				</div>
				<?php require_once('template/relation-category-sidebar.php'); ?>
                <div class="single-element">
                    <p class="title-singl-element title-block">Редирект</p>
                    <p class="title-singl-element">Тип редиректа</p>
                    <select name="post_redirect_type" class="admin-select">
                        <option <?=$object['redirect_type'] === '' ? 'selected' : ''?> value="">Без редиректа</option>
                        <option <?=$object['redirect_type'] === '301' ? 'selected' : ''?> value='301'>Постоянный (301)</option>
                        <option <?=$object['redirect_type'] === '302' ? 'selected' : ''?> value='302'>Временный (302)</option>
                    </select>
                    <p class="title-singl-element">URL</p>
                    <input type="text" class="form-control" value="<?=$object['redirect_url']?>" name="post_redirect_url">
                </div>
				<div class="single-element">
					<p class="title-singl-element">Сохранить все данные для текущего поста:</p>
					<input type="submit" class="btn btn-primary" name="save_post_data" value="Сохранить">
				</div>
			</div>
		</div>
	</div>
</form>
<div class="container wrapp_content">
	<?php require_once('template/acf-fragmet/acf-fragment-video.php'); ?>
</div>