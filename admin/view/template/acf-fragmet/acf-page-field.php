<?php
$field_names = [
    'online_order',
    'short_text_page',
    'accordeon_elm',
    'img_slider',
    'video_block_page',
    'recomended_prods',
    'rait_prod'
];
$fields = Core::getACF($post_id_acf, $field_names);
?>

<div class="single-element">
    <form method="POST">
        <p class="title-singl-element title-block">Краткое описание продукта:</p>
        <textarea
                id="editor-short-text"
                type="text" class="form-control"
                name="short_text_page"><?= stripcslashes($fields['short_text_page']) ?></textarea>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
    </form>
</div>

<div class="single-element">
    <h4 align="center">Фильры</h4>

    <div class="row">
        <div class="col-lg-6">
            <form method="POST"
                  action="/admin/admin.php?page=filter&post_id=<?= $object['id'] ?>&type=add_filter_value">
                <p class="title-singl-element title-block">Цена:</p>
                <input type="text" class="form-control" value="<?= $metadata['filters_value']['price'] ?>" name="value">
                <input type="hidden" class="form-control" value="price" name="type_name">
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
        </div>
        <div class="col-lg-6">
            <form method="POST"
                  action="/admin/admin.php?page=filter&post_id=<?= $object['id'] ?>&type=add_filter_value">
                <p class="title-singl-element title-block">Старая цена:</p>
                <input type="text" class="form-control" value="<?= $metadata['filters_value']['sales'] ?>" name="value">
                <input type="hidden" class="form-control" value="sales" name="type_name">
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <p class="title-singl-element title-block">Материал товара:</p>
            <form method="POST"
                  action="/admin/admin.php?page=filter&post_id=<?= $object['id'] ?>&type=add_filter_value">
                <input type="hidden" class="form-control" value="materials" name="type_name">
                <div class="input-group text-left relation-element-wrapp">
                    <?php
                    if ($metadata['materials']) {
                        foreach ($metadata['materials'] as $material) { ?>
                            <p class="relation-element">
                                <input type="radio" <?= $metadata['filters_value']['materials'] === $material['id'] ? 'checked' : '' ?>
                                       name="value" id="materials_<?= $material['id'] ?>"
                                       value="<?= $material['id'] ?>">
                                <label for="materials_<?= $material['id'] ?>"><?= $material['name_' . $object['lang']] ?></label>
                            </p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <p class="title-singl-element title-block">Бренд:</p>
            <form method="POST"
                  action="/admin/admin.php?page=filter&post_id=<?= $object['id'] ?>&type=add_filter_value">
                <input type="hidden" class="form-control" value="brands" name="type_name">
                <div class="input-group text-left relation-element-wrapp">
                    <?php
                    if ($metadata['brands']) {
                        foreach ($metadata['brands'] as $brand) { ?>
                            <p class="relation-element">
                                <input type="radio" <?= $metadata['filters_value']['brands'] === $brand['id'] ? 'checked' : ''; ?>
                                       name="value" id="brands_<?= $brand['id'] ?>" value="<?= $brand['id'] ?>">
                                <label for="brands_<?= $brand['id'] ?>"><?= $brand['name_' . $object['lang']] ?></label>
                            </p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <input type="submit" class="btn btn-primary" value="Сохранить">
            </form>
        </div>
    </div>
</div>

<div class="single-element">
    <div class="container wrapp_content">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Вопрос</th>
                <th scope="col">Ответ</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <form method="POST" action="/admin/admin.php?page=faq&post_id=<?= $object['id'] ?>">
                <tr>
                    <td><input class="form-control" type="text" name="question" required></td>
                    <td><textarea class="form-control" type="text" name="answer" required></textarea></td>
                    <td>
                        <button type="submit" name="add_question" class="btn btn-success btn-sm" value=""><i
                                    class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </form>
            <?php foreach ($metadata['faq'] as $question) : ?>
                <form method="post" action="/admin/admin.php?page=faq&post_id=<?= $object['id'] ?>">
                    <tr>
                        <input hidden name="id" value="<?= $question['id'] ?>">
                        <th><input class="form-control" type="text" name="question" required
                                   value="<?= $question['question'] ?>"></th>
                        <td><textarea class="form-control" type="text" name="answer"
                                      required><?= $question['answer'] ?></textarea></td>
                        <div class="row">
                            <td>
                                <div class="row">
                                    <button type="submit" class="btn btn-primary btn-sm" name="edit_question"><i
                                                class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                                    <button type="submit" class="btn btn-danger btn-sm" name="remove_question"><i
                                                class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                                </div>
                            </td>
                        </div>
                    </tr>
                </form>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="single-element">
    <form method="POST">
        <p class="title-singl-element title-block">Кнопки на опросный листы</p>
        <div class="single-element col-lg-12">
            <p class="title-singl-element">Ссылка на опросник:</p>
            <input type="text" class="form-control" name="online_order[]" placeholder="Ссылка на опросник"
                   value="<?= stripcslashes($fields['online_order'][0]) ?>">
        </div>
        <hr>
        <div class="single-element col-lg-12">
            <p class="title-singl-element">Ссылка на онлайн заказ:</p>
            <input type="text" class="form-control" name="online_order[]" placeholder="Ссылка на онлайн заказ"
                   value="<?= stripcslashes($fields['online_order'][1]) ?>">
        </div>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
    </form>
</div>

<!--  -->
<div class="single-element">
    <p class="title-singl-element title-block">Характеристики товара</p>
    <form method="POST">
        <div class="innerC-bl">
            <input type="hidden" name="count_arr_acf_field" value="2">
            <?php
            if (isset($fields['accordeon_elm']) && is_array($fields['accordeon_elm'])) {
                foreach ($fields['accordeon_elm'] as $img_brends) {
                    ?>
                    <div class="img-div-wrapp single-element col-lg-12">
                        <div class="col-lg-12">
                            <p class="title-singl-element">Название ячейки:</p>
                            <input type="text" class="form-control src-img" value="<?= $img_brends[0] ?>"
                                   name="accordeon_elm[]">
                        </div>
                        <div class="col-lg-12">
                            <hr>
                            <p class="title-singl-element">Текст ячейки:</p>
                            <textarea class="form-control text-block-cj" value=""
                                      name="accordeon_elm[]"><?= $img_brends[1] ?></textarea>
                            <hr>
                            <div class="remove-slide-f">Удалить</div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div data-name-input="accordeon_elm" class="add-to-text-block">
            Добавить блок
        </div>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить слайдер">
    </form>
</div>

<!--  -->
<div class="single-element">
    <p class="title-singl-element title-block">Слайдер продукта</p>
    <form method="POST">
        <div class="innerC-bl">
            <input type="hidden" name="count_arr_acf_field" value="3">
            <?php
            if (isset($fields['img_slider']) && is_array($fields['img_slider'])) {
                foreach ($fields['img_slider'] as $img_slider) {
                    ?>
                    <div class="img-div-wrapp single-element col-lg-6">
                        <div class="col-lg-4">
                            <img style="width:100%;height:auto;" class="img-prev-slider" src="<?= $img_slider[0] ?>">
                        </div>
                        <div class="col-lg-8">
                            <p class="title-singl-element">урл картинки:</p>
                            <input type="text" class="form-control src-img" value="<?= $img_slider[0] ?>"
                                   name="img_slider[]">
                            <hr>
                            <div class="remove-slide-f">Удалить</div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                            <p class="title-singl-element">aлт картинки:</p>
                            <input type="text" class="form-control" value="<?= $img_slider[1] ?>" name="img_slider[]">
                            <hr>
                            <p class="title-singl-element">тайтл картинки:</p>
                            <input type="text" class="form-control" value="<?= $img_slider[2] ?>" name="img_slider[]">
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


<!-- block video -->
<form method="POST">
    <div class="single-element col-lg-12">
        <p class="title-singl-element title-block">Block video (url video):</p>
        <input type="text" class="form-control" value="<?= $fields['video_block_page'][0] ?>" name="video_block_page[]">
        <hr>
        <p class="title-singl-element title-block">Block video (Текст):</p>
        <textarea class="form-control" name="video_block_page[]"><?= $fields['video_block_page'][1] ?></textarea>
        <hr>
        <p class="title-singl-element title-block">Block video (текст соцсетей):</p>
        <textarea class="form-control" name="video_block_page[]"><?= $fields['video_block_page'][2] ?></textarea>
        <hr>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">

    </div>
</form>
<!-- end block video -->

<!-- рекомендованые товары -->
<form method="POST">
    <div class="single-element col-lg-12">
        <p class="title-singl-element title-block">Рекомендованые товары:</p>
        <p class="title-singl-element">Введите id товаров через запятую!</p>
        <input type="text" class="form-control" value="<?= $fields['recomended_prods'] ?>" name="recomended_prods">
        <hr>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
    </div>
</form>
<!--  end рекомендованые товары-->

<!--рейтин товара -->
<form method="POST">
    <div class="single-element col-lg-12">
        <p class="title-singl-element title-block">Рейтинг товара:</p>
        <p class="title-singl-element">Введите число от 1 до 5</p>
        <input type="number" min="0" max="5" class="form-control" value="<?= $fields['rait_prod'] ?>" name="rait_prod">
        <hr>
        <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_INIT_999" value="Сохранить">
    </div>
</form>
<!--  -->

	