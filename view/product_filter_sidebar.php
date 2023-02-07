<?php $search_lang = $LANG === 'ru' ? 'Поиск' : ($LANG === 'uk' ? 'Пошук' : 'Search') ?>
<div class="filters-bar">
    <form class="filter_form" method="get" action="./FilterCategory">
        <div class="col-lg-12 filters right">
            <h3 align="center"><?= $LANG === 'ru' ? 'Фильтры' : ($LANG === 'uk' ? 'Фільтри' : 'Filters') ?></h3>
        </div>
        <?php if (!empty($metadata['filters']['checkbox']['sales']['visible'])) : ?>
            <div class="col-lg-12 filters">
                <hr>
            </div>
            <div class="col-lg-12 filters right">
                <input type="checkbox" name="sales" <?php $metadata['filters_selected']['sales'] ? 'checked ' : '';
                isset($metadata['count_filters']['sales']) && (int)$metadata['count_filters']['sales'] ? '' : ' disabled '; ?>>
                <label for="sales"><?= $LANG === 'ru' ? 'Акционные товары' : ($LANG === 'uk' ? 'Акційні товари' : 'Promotional goods') ?></label>
                <span class="filter-span">(<?= (int)$metadata['count_filters']['sales'] ?? 0 ?>)</span>
            </div>
            <div class="col-lg-12 filters">
                <hr>
            </div>
        <?php endif;
        if (!empty($metadata['filters']['lists']['brands'])) :?>
            <div class="col-lg-12 filters right">
                <p><?= $LANG === 'ru' ? 'Торговая марка' : ($LANG === 'uk' ? 'Торгова марка' : 'Brand') ?></p>
                <input type="search" name="search_brands" class="filters_search" placeholder="<?= $search_lang ?>">
                <ul>
                    <?php foreach ($metadata['filters']['lists']['brands'] as $brand): ?>
                        <li>
                            <?php $checked = !empty($metadata['filters_selected']['brands_id']) && in_array($brand['type_id'], $metadata['filters_selected']['brands_id']) ? 'checked' : ''; ?>
                            <input type="checkbox" <?= $checked ?> name="brand_<?= $brand['type_id'] ?>"
                                   id="brand_<?= $brand['type_id'] ?>" data-id="<?= $brand['type_id'] ?>"
                                   data-filter="brand" class="checkbox-filter__link"
                                <?= isset($metadata['count_filters']['brands'][$brand['type_id']]) && (int)$metadata['count_filters']['brands'][$brand['type_id']] ? '' : ' disabled'; ?>>
                            <label for="brand_<?= $brand['type_id'] ?>">
                                <?= $brand["name_" . $LANG] ?>
                            </label>
                            <span class="filter-span"><?= (int)$metadata['count_filters']['brands'][$brand['type_id']] ?? 0 ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-12 filters">
                <hr>
            </div>
        <?php endif;
        if (!empty($metadata['filters']['checkbox']['prices']['visible'])) : ?>
            <div class="col-lg-12 filters right">
                <p>Цена</p>
                <div class="col-lg-12">
                    <div class="row">
                        <input type="number" class="col-lg-4" name="filter_price_min" maxlength="10" min="0"
                               value="<?= $_GET['price_min'] ?>">
                        <span class="col-lg-1">-</span>
                        <input type="number" class="col-lg-4" name="filter_price_max" maxlength="10"
                               value="<?= $_GET['price_max'] ?>">
                        <input type="submit" class="btn btn-primary btn-sm col-lg-2" style="float: right" value="Ок"
                               onclick="setFiltersCategory('price')">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 filters">
                <hr>
            </div>
        <?php endif;
        if (!empty($metadata['filters']['lists']['materials'])) :?>
            <div class="col-lg-12 filters right">
                <p><?= $LANG === 'ru' ? 'Материал' : ($LANG === 'uk' ? 'Материал' : 'material') ?></p>
                <input type="search" name="search_materials" class="filters_search" placeholder="<?= $search_lang ?>">
                <ul>
                    <?php foreach ($metadata['filters']['lists']['materials'] as $material): ?>
                        <li>
                            <?php $checked = !empty($metadata['filters_selected']['materials_id']) && in_array($material['type_id'], $metadata['filters_selected']['materials_id']) ? 'checked' : ''; ?>
                            <input type="checkbox"<?= $checked ?> name="material_<?= $material['type_id'] ?>"
                                   id="material_<?= $material['type_id'] ?>" data-id="<?= $material['type_id'] ?>"
                                   data-filter="material" class="checkbox-filter__link"
                                <?= isset($metadata['count_filters']['materials'][$material['type_id']]) && (int)$metadata['count_filters']['materials'][$material['type_id']] ? '' : ' disabled '; ?>>
                            <label for="material_<?= $material['type_id'] ?>">
                                <?= $material["name_" . $LANG] ?>
                            </label>
                            <span><?= (int)$metadata['count_filters']['materials'][$material['type_id']] ?? 0 ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</div>
<!-- end left menu -->