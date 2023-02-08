<?php

class LangController
{
    public function actionLang()
    {
        if (isset($_POST['add_new_page_lang'])) {
            $langAction = new Lang();
            $post_id = $langAction->createLang();
        } elseif (isset($_POST['add_new_page_local'])) {
            $langAction = new Lang();
            $post_id = $langAction->createLangLocal();
        }

        if ($url = $this->getRedirectUrl($post_id)) {
            header('Location:' . $url);
        }
    }

    private function getRedirectUrl($post_id)
    {
        if ($post_id) {
            $post = Lang::getPostById($post_id);
            return 'https://' . $_SERVER['HTTP_HOST'] . '/admin/admin.php?page=singl' . $post['type'] . '&post_id=' . $post['id'];
        }
        return '';
    }
}