<div class="single-element">
    <h4 align="center">Фильры</h4>

    <div class="row">
        <div class="col-lg-6">
            <form method="POST">
                <p class="title-singl-element title-block">Цена:</p>
                <input type="text" class="form-control" value="<?=$object['price']?>" name="price">
                <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_FILTERS_999" value="Сохранить">
            </form>
        </div>
        <div class="col-lg-6">
            <form method="POST">
                <p class="title-singl-element title-block">Старая цена:</p>
                <input type="text" class="form-control" value="<?=$object['sales']?>" name="sales">
                <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_FILTERS_999" value="Сохранить">
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <p class="title-singl-element title-block">Материал товара:</p>
            <div class="input-group text-left relation-element-wrapp">
                <?php
                if( $metadata['materials'] )
                {
                    foreach ( $metadata['materials'] as $material ) { ?>
                        <p class="relation-element">
                            <input type="radio" <?= $object['materials_id'] === $material['id']  ? 'checked' : ''?> name="materials_id" id="materials_<?= $material['id'] ?>" value="<?= $material['id'] ?>">
                            <label for="materials_<?= $material['id'] ?>"><?= $material['name'] ?></label>
                        </p>
                        <?php
                    }
                }
                ?>
            </div>
            <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_FILTERS_999" value="Сохранить">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <p class="title-singl-element title-block">Бренд:</p>
            <div class="input-group text-left relation-element-wrapp">
                <?php
                if( $metadata['brands'] )
                {
                    foreach ( $metadata['brands'] as $brand ) { ?>
                        <p class="relation-element">
                            <input type="hidden" name="type_id" value="<?= $brand['id'] ?>">
                            <input type="radio" <?= $object['brands_id'] === $brand['id'] ? 'checked' : '';?> name="brands_id" id="brands_<?= $brand['id'] ?>" value="<?= $brand['id'] ?>">
                            <label for="brands_<?= $brand['id'] ?>"><?= $brand['name'] ?></label>
                        </p>
                        <?php
                    }
                }
                ?>
            </div>
            <input type="submit" class="btn btn-primary" name="SAVE_ACF_FIELD_FILTERS_999" value="Сохранить">
        </div>
    </div>
</div>
