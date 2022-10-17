<?php
/**
 *
 */
class RegionalityController
{
    public $data_errors = array();

    public function actionRegionality($template)
    {
        $errors = $data_object = [];
        if(isset($_POST['edit_city']))
        {
            $validate = $this->validate_city($_POST);
            $validate['data']['id'] = $_POST['id'];

            $errors = empty($validate['errors']) ? Regionality::editCity($validate['data']) : $validate['errors'];
        }
        if(isset($_POST['add_city']))
        {
            $validate = $this->validate_city($_POST);
            $errors = empty($validate['errors']) ? Regionality::addCity($validate['data']) : $validate['errors'];
        }
        if(isset($_POST['remove_city']) && (int)$_POST['id'] > 0)
        {
            $errors = Regionality::removeCity((int)$_POST['id']);
        }

        $data_object['cities'] = Regionality::getCities() ?? [];
        $data_object['states'] = Regionality::getStates();
        TemplateController::actionTemplate($template,$data_object,$errors);

        return true;
    }

    private function validate_city($post)
    {
        $data = $errors = [];

        if (empty($post['name_uk']) || empty($post['name_ru']) || empty($post['name_en']) ) {
            $errors[] = '<p>Название не может быть пустым</p><br>';
        } else {
            $data['name_uk'] = $post['name_uk'];
            $data['name_ru'] = $post['name_ru'];
            $data['name_en'] = $post['name_en'];
        }
        if (empty($post['state_id'])) {
            $errors[] = '<p>Область не выбрана</p><br>';
        } else {
            $data['state_id'] = $post['state_id'];
        }
        if (isset($post['url_part'])) {
            $data['url_part'] = mb_strtolower($post['url_part']);
        } else {
            $data['url_part'] = UrlRendering::replaseAZ(str_replace(["'",'"','`'],'',mb_strtolower(trim($post['name_ru']))));
        }

        $data['header_visible'] = isset($post['header_visible']) ? 1 : 0;

        return compact('data','errors');
    }
}