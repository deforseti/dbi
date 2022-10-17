<?php if (isset($metadata['errors_post'])) :?>
<div class="col-lg-12">
    <?php
    if($metadata['errors_post'] === true)
    {
        echo '<p class="alert-info alert-ok">Сохранено! :)</p>';
    }else
    {
        echo '<p class="alert-info alert-error">Ошибка сохранения! :(</p>';
        echo implode('',$metadata['errors_post']);
    }
    ?>
</div>
<?php endif;?>

<div class="container wrapp_content">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Название ru</th>
            <th scope="col">Название uk</th>
            <th scope="col">Название en</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
            <form method="POST">
                <tr>
                    <td><input class="form-control" type="text" name="name_ru" required></td>
                    <td><input class="form-control" type="text" name="name_uk" required></td>
                    <td><input class="form-control" type="text" name="name_en" required></td>
                    <td>
                        <button type="submit" name="add_filter" class="btn btn-success btn-sm" value=""><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></button>
                    </td>
                </tr>
            </form>
            <?php foreach ($object['brands'] as $brand) :?>
                <form method="post">
                <tr>
                    <input hidden name="id" value="<?= $brand['id']?>">
                    <th><input class="form-control" type="text" name="name_ru" required value="<?= $brand['name_ru'] ?>"></th>
                    <td><input class="form-control" type="text" name="name_uk" required value="<?= $brand['name_uk'] ?>"></td>
                    <td><input class="form-control" type="text" name="name_en" required value="<?= $brand['name_en'] ?>"></td>
                    <div class="row">
                        <td>
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit_filter"><i class="glyphicon glyphicon-ok" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-danger btn-sm" name="remove_filter"><i class="glyphicon glyphicon-trash" aria-hidden="true"></i></button>
                            </div>
                        </td>
                    </div>
                </tr>
            </form>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
