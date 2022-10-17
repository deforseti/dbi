<?php


class FaqController
{
    public function actionFaq ()
    {
        if (isset($_POST['add_question'])) {
            Faq::add_question($_GET['post_id'], $_POST['question'] ?? '', $_POST['answer'] ?? '');
        } elseif(isset($_POST['edit_question'])) {
            Faq::update_questions($_POST['id'], $_POST['question'], $_POST['answer']);
        } elseif(isset($_POST['remove_question']) && !empty($_POST['id'])) {
            Faq::remove_questions($_POST['id']);
        }

        if (isset($_POST)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        return true;
    }
}