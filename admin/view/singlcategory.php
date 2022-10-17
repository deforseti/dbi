
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
                    <?php if ((int)$object['city_id'] === 1):?>
                        <input type="text" class="form-control" value="<?=$object['url']?>" name="post_url">
                    <?php else :?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><?= $metadata['cities_url'][$object['city_id']]?>/</span>
                                    <input type="text" class="form-control" value="<?=$object['url']?>" name="post_url" aria-describedby="basic-addon1">
                                    <span class="input-group-btn">
                                        <a href="/<?= $metadata['cities_url'][$object['city_id']] .'/'. $object['url']?>" class="btn btn-default" type="button" target="_blank"><i class="glyphicon glyphicon-share-alt"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
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
	<?php if ($object['count_subcategories'] > 0) require_once('template/acf-fragmet/acf-fragment-menu-second-category.php'); ?>
</div>
<script>
    function add_filter(type,id) {
        let brand_list = $('#' + type + '_filter_list'),
            new_brand = '#' + type + '_' + id;
            position = $('#brand_filter_list li').last().attr('data-post-position') ? +$('#brand_filter_list li').last().attr('data-post-position') + 1 : 0,
            new_position = '<li data-post-id="' + id + '" data-post-position="' + position + '" class="ui-state-default ui-sortable-handle">' + $(new_brand).text() + '<i onclick="remove_filter(this,\'brand\',' + id +');return false; " class="glyphicon glyphicon-trash" aria-hidden="true" style="float: right"></i></li>';
        $(new_brand).closest('p').remove();
        $(brand_list).append(new_position);
        add_change_filter(type);
    }
    function remove_filter(button,type,id) {
        let selector = $(button).closest('li'),
            html  = '<p class="relation-element" name="p_brand_' + id +'">';
            html += '   <span data-post_id="' + id + '" id="brand_' + id + '">' + $(selector).text() + '</span>';
            html += '   <button class="btn btn-success btn-sm" style="float: right" onclick="add_filter(\'#' + type +'_'+id+'\',' + id + ');return false;">';
            html += '       <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>'
            html += '   </button>';
            html += '</p>';
        $('div[name="' +type+ '_list"]').append(html);
        $(selector).remove();
        add_change_filter(type);
    }

    function add_change_filter(type) {
        let form = $('#' + type + '_form_filter'),
            arr_position = new Array();
        if ($('#' + type + '_filter_list li').length === 0) {
            $('input[name="sortable_element"]').removeAttr('value');
        } else {
            $('#' + type + '_filter_list li').each(function () {
                let j_data_arr = {
                    "id": $(this).attr('data-post-id'),
                    "position": $(this).attr('data-post-position')
                };
                arr_position.push(j_data_arr);
                let position_json = JSON.stringify(arr_position);
                $(form).val(position_json);
            });
        }
    }
</script>