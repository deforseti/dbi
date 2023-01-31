<div class="container wrapp_content">
    <div class="row">
        <div class="col-lg-12">
            <?php
            if (isset($metadata['menu_saved'])) {
                if ($metadata['menu_saved'] === true) {
                    echo '<p class="alert-info alert-ok">Меню сохранено :)</p>';
                } elseif ($metadata['menu_saved'] === false) {
                    echo '<p class="alert-info alert-error">Ошибка сохранения! :(</p>';
                }
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="single-element">
                <p class="title-singl-element title-block">Меню сайта</p>
                <div class="col-lg-12">
                    <?php foreach ($metadata['menu_cities'] as $city): ?>
                        <div class="pull-left">
                            <?php if ($metadata['cur_city'] === $city['id']): ?>
                                <span class="text-success"
                                      style="padding: 0 2px;text-decoration: underline;"><?= $city['name'] ?></span>
                            <?php else: ?>
                                <a class="" href="<?= $city['href'] ?>" style="padding: 0 2px;"><?= $city['name'] ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <ul class="menu-names-item-list">
                    <?php
                    $metadata['menu_list'][$metadata['cur_city']] = empty($metadata['menu_list'][$metadata['cur_city']]) ? [] : $metadata['menu_list'][$metadata['cur_city']];
                    foreach ($metadata['menu_list'][$metadata['cur_city']] as $key => $menu_item) {

                        ?>
                        <li>
                            <?= $menu_item['menu_name'] ?>
                            <?php
                            foreach ($metadata['menu_list'][$metadata['cur_city']] as $k => $item_m) {
                                if ($item_m['menu_name'] == $menu_item['menu_name']) {
                                    ?>
                                    <a class="
													<?php
                                    if ($item_m['id'] == (int)$_GET['menu_id']) {
                                        echo 'curr_menu_lang ';
                                    }
                                    ?>
													menu-lang-swich"
                                       href="?page=menu&menu_id=<?= $item_m['id'] ?>&lang=<?= $item_m['lang'] ?><?= empty($metadata['cur_city']) ? '' : '&city=' . $metadata['cur_city'] ?>"><?= $item_m['lang'] ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </li>
                        <?php
                        if ($key == 3) {
                            break;
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <form method="POST">
            <div class="col-lg-5">
                <?php
                if (is_array($object)) {
                    foreach ($object as $key => $bl_type) {
                        ?>
                        <div class="single-element">
                            <p class="title-singl-element title-block"><?= $bl_type['name_block'] ?></p>
                            <div class="input-group text-left relation-element-wrapp">
                                <?php
                                if (is_array($bl_type['list_elems'])) {
                                    foreach ($bl_type['list_elems'] as $k => $item) {
                                        ?>
                                        <p class="relation-element">
                                            <input type="checkbox" name="relation_category[]"
                                                   id="relation_cat_<?= $item['id'] ?>"
                                                   value="<?= $item['id'] ?>|||<?= $item['post_name'] ?>|||<?= (empty($item['city']) ? 'Украина' : $item['city']) ?>">
                                            <label for="relation_cat_<?= $item['id'] ?>"><?= $item['post_name'] . (empty($item['city']) ? 'Украина' : " | " . $item['city']) ?></label>
                                        </p>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <input type="submit" class="btn btn-primary" name="add_element_to_menu" value="Добавить в меню">
            </div>
        </form>
        <?php
        if (isset($metadata['menu_data'])) {
            include_once('template/menu-data.php');
        }

        ?>
    </div>
</div>