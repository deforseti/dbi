<?php
/**
 *
 */
class FilterController
{
    public $data_errors = array();

    public function actionFilter($template)
    {
        $_template = $_GET['type'] ?? 'page404';

        switch ($_template) {
            case 'brands' :
                $this->actionFilterOptions('brands');
                break;
            case 'materials' :
                $this->actionFilterOptions('materials');
                break;
            case 'save_brand_filter' :
                $this->save_filter();
                header('Location: /admin/admin.php?page=singlcategory&post_id=' . $_GET['post_id']);
                break;
            case 'save_material_filter' :
                $this->save_filter();
                header('Location: /admin/admin.php?page=singlcategory&post_id=' . $_GET['post_id']);
                break;
            case 'save_price_filter' :
                $this->save_filter();
                header('Location: /admin/admin.php?page=singlcategory&post_id=' . $_GET['post_id']);
                break;
            case 'save_sales_filter' :
                $this->save_filter();
                header('Location: /admin/admin.php?page=singlcategory&post_id=' . $_GET['post_id']);
                break;
            case 'add_filter_value' :
                $this->add_filter_value();
                header('Location: /admin/admin.php?page=singlpage&post_id=' . $_GET['post_id']);
                break;
            default :
                header('Location: /page404');
                break;
        }

        return true;
    }

    private function add_filter_value()
    {
        $data = empty($_POST[0]) ? $_POST : $_POST[0];

        $filters_list = array('brands','materials','sales','price');

        if (FILTER::get_filter_value($_GET['post_id'], $data['type_name']) && in_array($data['type_name'],$filters_list)) {
            FILTER::update_filter_value( $_GET['post_id'],$data);
        } elseif(in_array($data['type_name'],$filters_list)) {
            FILTER::add_filter_value( $_GET['post_id'],$data);
        }
    }

    private function actionFilterOptions($filter_name)
    {
        $data_object = [];

        if(isset($_POST['edit_filter']))
        {

            $validate = $this->validate_filter($_POST);
            $validate['data']['id'] = $_POST['id'];

            $this->data_errors['errors_post'] = empty($validate['errors']) ? Filter::editFilter($filter_name, $validate['data']) : $validate['errors'];
        }
        if(isset($_POST['add_filter']))
        {
            $validate = $this->validate_filter($_POST);
            if ($filter = Filter::getFilterListByType($filter_name,"WHERE name_uk ='{$_POST['name_uk']}' OR name_ru='{$_POST['name_ru']}' OR name_en='{$_POST['name_en']}'" )) {
                $validate['errors'][] = "<p>Бренд уже существует. ID = { $filter[0]['id'] }</p><br>";
            }
            if (empty($validate['errors'])) {
                $this->data_errors['errors_post'] = Filter::addFilterList($filter_name, $validate['data']) ? true : [];
            } else {
                $this->data_errors['errors_post'] = $validate['errors'];
            }
        }
        if(isset($_POST['remove_filter']) && (int)$_POST['id'] > 0)
        {
            $this->data_errors['errors_post'] = Filter::removeFilter($filter_name, (int)$_POST['id']);
        }
        $data_object[$filter_name] = Filter::getFilterListByType($filter_name) ?? [];
        $data_object['states'] = Filter::getStates();
        TemplateController::actionTemplate("template/filters/{$filter_name}",$data_object,$this->data_errors);

        return true;
    }

    private function validate_filter($post)
    {
        $data = $errors = [];

        if (empty($post['name_uk']) || empty($post['name_ru']) || empty($post['name_en']) ) {
            $errors[] = '<p>Название бренда не может быть пустым</p><br>';
        } else {
            $data['name_uk'] = $post['name_uk'];
            $data['name_ru'] = $post['name_ru'];
            $data['name_en'] = $post['name_en'];
        }
        return compact('data','errors');
    }

    public function save_filter()
    {
        if( isset($_POST['save_brand_filter']) && $_GET['post_id'] )
        {
            if (Filter::getFilters($_GET['post_id'],'brands')) {
                $errors = Filter::updateFilter($_POST['sortable_element'],$_GET['post_id'],'brands');
            } else {
                $errors = Filter::addFilter($_POST['sortable_element'],$_GET['post_id'],'brands');
            }
            $this->data_array['position_element'] = $errors;
        }
        if( isset($_POST['save_material_filter']) && $_GET['post_id'] )
        {
            if (Filter::getFilters($_GET['post_id'],'materials')) {
                $errors = Filter::updateFilter($_POST['sortable_element'],$_GET['post_id'],'materials');
            } else {
                $errors = Filter::addFilter($_POST['sortable_element'],$_GET['post_id'],'materials');
            }
            $this->data_array['position_element'] = $errors;
        }
        if( isset($_POST['save_price_filter']) && $_GET['post_id'] )
        {
            $visible = isset($_POST['price_visible']) ? 1 : 0;

            if (Filter::getFilters($_GET['post_id'],'prices')) {
                $errors = Filter::updateFilterCheckbox($visible,$_GET['post_id'],'prices');
            } else {
                $errors = Filter::addFilterCheckbox($visible,$_GET['post_id'],'prices');
            }
            $this->data_array['position_element'] = $errors;
        }
        if( isset($_POST['save_sales_filter']) && $_GET['post_id'] )
        {
            $visible = isset($_POST['sales_visible']) ? 1 : 0;

            if (Filter::getFilters($_GET['post_id'],'sales')) {
                $errors = Filter::updateFilterCheckbox($visible,$_GET['post_id'],'sales');
            } else {
                $errors = Filter::addFilterCheckbox($visible,$_GET['post_id'],'sales');
            }
            $this->data_array['position_element'] = $errors;
        }
    }
}