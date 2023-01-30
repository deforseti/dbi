
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?=$object['url']?>" name="post_url">
                                <span class="input-group-btn">
                                    <a href="/<?=  $object['url']?>" class="btn btn-default" type="button" target="_blank"><i class="glyphicon glyphicon-share-alt"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="single-element">
					<p class="title-singl-element title-block">Контент поста:</p>
					<textarea id="editor" type="text" class="form-control" name="post_content"><?=stripcslashes($object['content'])?></textarea>
				</div>
			</div>

			<div class="col-lg-4">
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
				<input type="hidden" name="home_id" value="<?=$object['id']?>">
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
					<input type="submit" class="btn btn-primary" name="save_home_data" value="Сохранить">
				</div>
			</div>
		</div>
	</div>
</form>
<!-- ACF -->
<?php include 'template/acf-fragmet/home-page-acf.php';   ?>
<!--END ACF -->