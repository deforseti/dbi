
<div class="ret_tm_kros">
	<div class="left_menu1">
		<div class="menu_map">
            <div class="col-lg-12 filters right">
                <h3 align="center">
                    <?= $LANG === 'ru' ? 'Фильтры' : ($LANG === 'uk' ? 'Фільтри' : 'Filters');
                        if ((int)$object['count_chield'] >= 0 && (!empty($metadata['filters']['lists'])
                        || !empty($metadata['filters']['checkbox']))) { ?>
                    <span id="category-arrow-left" style="float: right;display: none" onclick="categoriesHide(true)">⬅</span>
                    <span id="category-arrow-down" style="float: right;" onclick="categoriesHide(false)">⬇</span>
                    <?php } ?>
                </h3>
            </div>
			<div class="demo-container clear">
				<div class="test" <?= $filters_menu ? 'style="display: none"' : ''?>>
					<?php $init_menu->actionMenu('left-menu'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end left menu -->