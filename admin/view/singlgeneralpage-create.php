
<form method="POST">
	<div class="container wrapp_content">
		<div class="row">
			<div class="col-lg-8">
				<div class="single-element">
					<p class="title-singl-element title-block">Название:</p>
					<input required="required" type="text" class="form-control" value="" name="post_name">
				</div>
				<div class="single-element">
					<p class="title-singl-element title-block">Ссылка поста:</p>
					<p class="title-singl-element">Продублируйте название поста, скрипт сам сделает транслейт!</p>
					<input type="text" class="form-control" value="" name="post_url">
				</div>
				<div class="single-element">
					<p class="title-singl-element title-block">Мета СЕО:</p>
					<p class="title-singl-element">тайтл:</p>
					<textarea type="text" class="form-control" name="post_title"></textarea>
					<hr>
					<p class="title-singl-element">дескрипшин:</p>
					<textarea type="text" class="form-control" name="post_description"></textarea>
					<hr>
					<p class="title-singl-element">кейвордс:</p>
					<textarea type="text" class="form-control" name="post_keywords"></textarea>
                    <hr>
                    <p class="title-singl-element">каноникал:</p>
                    <input type="text" class="form-control" name="post_canonical">
				</div>
				<div class="single-element">
					<p class="title-singl-element title-block">Контент поста:</p>
					<textarea id="editor" type="text" class="form-control" name="post_content"></textarea>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-element sidebar">
					<p class="title-singl-element title-block">Изображение:</p>
					<div class="img_post_view">
						<img src="">
					</div>
					<p class="title-singl-element">урл картинки:</p>
					<input type="text" class="form-control" value="" name="img_url">
					<hr>
					<p class="title-singl-element">альт картинки:</p>
					<input type="text" class="form-control" value="" name="img_alt">
					<hr>
					<p class="title-singl-element">тайтл картинки:</p>
					<input type="text" class="form-control" value="" name="img_title">
				</div>
				<div class="single-element">
					<p class="title-singl-element">Сохранить все данные для текущего поста:</p>
					<input type="submit" class="btn btn-primary" name="create_post_data" value="Сохранить">
				</div>
			</div>
		</div>
	</div>
</form>