<div class="single-element col-lg-12">
    <h3 align="center">Настройка фильтров</h3>
    <div class="col-lg-12">
        <p align="center">Отображать фильтры (чекбоксы)</p>
        <div class="single-element col-lg-3">
            <form method="POST" action="/admin/admin.php?page=filter&type=save_price_filter&post_id=<?= $object['id']?>">
                <label for="price_<?= $object['id']?>">Цена</label>
                <input type="checkbox" name="price_visible" <?= $metadata['filters_checkbox']['prices']['visible'] ? 'checked' : ''?> >
                <button type="submit" class="btn btn-primary" name="save_price_filter">Сохранить</button>
            </form>
        </div>
        <div class="single-element col-lg-3">
            <form method="POST" action="/admin/admin.php?page=filter&type=save_sales_filter&post_id=<?= $object['id']?>">
                <label for="sales_<?= $object['id']?>">Акция</label>
                <input type="checkbox"  name="sales_visible" <?= $metadata['filters_checkbox']['sales']['visible'] ? 'checked' : ''?> >
                <button type="submit" class="btn btn-primary" name="save_sales_filter">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="col-lg-12">
        <hr>
        <div class="col-lg-4">
            <p class="title-singl-element title-block">Торговая марка</p>
            <div class="single-element">
                <form method="POST">
                        <div class="input-group text-left relation-element-wrapp" name="brand_list">
                            <?php foreach ($metadata['filters']['brands']['lists'] as $key=>$brand):?>
                                <p class="relation-element" name="p_brand_<?= $brand['id']?>">
                                    <span data-post-id="<?= $brand['id']?>" id="brand_<?= $brand['id']?>"><?= $brand["name_{$object['lang']}"]?></span>
                                    <button class="btn btn-success btn-sm" style="float: right" onclick="add_filter('brand',<?= $brand['id']?>);return false;">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                    </button>
                                </p>
                            <?php endforeach;?>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-11">
                    <p class="title-singl-element title-block">Фильтр торговой марки</p>
                    <div class="single-element">
                        <ul class="posts-structure-sortable ui-sortable" id="brand_filter_list">
                            <?php foreach ($metadata['filters']['brands']['filter_list'] as $key=>$brand):?>
                            <li data-post-id="<?= $brand['type_id']?>" data-post-position="<?= $brand['position']?>" class="ui-state-default ui-sortable-handle"><?= $brand['name_ru'] ?><i onclick="remove_filter(this,'brand',<?= $brand['type_id']?>);return false; " class="glyphicon glyphicon-trash" aria-hidden="true" style="float: right"></i></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <form method="POST" action="/admin/admin.php?page=filter&type=save_brand_filter&post_id=<?= $object['id']?>">
                        <input type="hidden" name="sortable_element" id="brand_form_filter" value="<?= json_encode($metadata['brands_filter'])?>">
                        <input type="submit" class="btn btn-primary" name="save_brand_filter" value="Сохранить фильтр по бренду">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <hr>
        <div class="col-lg-4">
            <p class="title-singl-element title-block">Материал</p>
            <div class="single-element">
                <form method="POST">
                    <div class="input-group text-left relation-element-wrapp" name="material_list">
                        <?php foreach ($metadata['filters']['materials']['lists'] as $key=>$material):?>
                            <p class="relation-element" name="p_material_<?= $material['id']?>">
                                <span data-post-id="<?= $material['id']?>" id="material_<?= $material['id']?>"><?= $material["name_{$object['lang']}"]?></span>
                                <button class="btn btn-success btn-sm" style="float: right" onclick="add_filter('material',<?= $material['id']?>);return false;">
                                    <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                </button>
                            </p>
                        <?php endforeach;?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-11">
                    <p class="title-singl-element title-block">Фильтр материалов</p>
                    <div class="single-element">
                        <ul class="posts-structure-sortable ui-sortable" id="material_filter_list">
                            <?php foreach ($metadata['filters']['materials']['filter_list'] as $key=>$material):?>
                                <li data-post-id="<?= $material['type_id']?>" data-post-position="<?= $material['position']?>" class="ui-state-default ui-sortable-handle"><?= $material['name_ru'] ?><i onclick="remove_filter(this,'material',<?= $material['type_id']?>);return false; " class="glyphicon glyphicon-trash" aria-hidden="true" style="float: right"></i></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <form method="POST" action="/admin/admin.php?page=filter&type=save_material_filter&post_id=<?= $object['id']?>">
                        <input type="hidden" name="sortable_element" id="material_form_filter" value="<?= json_encode($metadata['materials_filter'])?>">
                        <input type="submit" class="btn btn-primary" name="save_material_filter" value="Сохранить фильтр по материалу">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>