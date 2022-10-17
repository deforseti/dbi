<div class="container wrapp_content">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название ru</th>
            <th scope="col">Название uk</th>
            <th scope="col">Название en</th>
            <th scope="col">Подпапка</th>
            <th scope="col">Область</th>
            <th scope="col">Крупный</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
            <form method="POST">
                <tr>
                    <td><input class="form-control" type="text" name="name_ru" required></td>
                    <td><input class="form-control" type="text" name="name_uk" required></td>
                    <td><input class="form-control" type="text" name="name_en" required></td>
                    <td><input class="form-control" type="text" name="url_part" required disabled></td>
                    <td>
                        <select name="state_id" class="form-select" style="color: black">
                            <?php foreach ($object['states'] as $state):?>
                                <option value="<?=$state['id']?>" <?php
                                if ($state['id'] == 10) echo 'selected'?>><?= $state['name']?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td align="center"><input type="checkbox" name="header_visible" <?php if ($city['header_visible']) echo 'checked';?>></td>
                    <td>
                        <button type="submit" name="add_city" class="btn btn-success btn-sm" value=""><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </form>
            <?php foreach ($object['cities'] as $city) :?>
            <?php $disabled = $city['name_ru'] === "Киев" ? 'disabled' : '' ?>
            <form method="post">
                <tr>
                    <input hidden name="id" value="<?= $city['id']?>">
                    <th><input class="form-control" type="text" name="name_ru" <?= $disabled ?> required value="<?= $city['name_ru'] ?>"></th>
                    <td><input class="form-control" type="text" name="name_uk" <?= $disabled ?> required value="<?= $city['name_uk'] ?>"></td>
                    <td><input class="form-control" type="text" name="name_en" <?= $disabled ?> required value="<?= $city['name_en'] ?>"></td>
                    <td><input class="form-control" type="text" name="url_part" <?= $disabled ?> value="<?= $city['url_part'] ?>"></td>
                    <td>
                        <select name="state_id" class="form-select" style="color: black" <?= $disabled ?>>
                            <?php foreach ($object['states'] as $state):?>
                            <option value="<?=$state['id']?>" <?php
                                if ($state['id'] === $city['state_id']) echo 'selected'?>><?= $state['name']?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td align="center"><input type="checkbox" name="header_visible" <?php if ($city['header_visible']) echo 'checked';?>></td>
                    <div class="row">
                        <td>
                            <div class="row">
                            <?php if ($disabled === ''):?>
                                <button type="submit" class="btn btn-primary btn-sm" name="edit_city"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-danger btn-sm" name="remove_city"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                            <?php endif;?>
                            </div>
                        </td>
                    </div>
                </tr>
            </form>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
