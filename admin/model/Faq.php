<?php


class Faq
{
    public static function add_question($post_id, $question, $answer)
    {
        global $db;

        return $db->query("INSERT INTO dbi_faq (`post_id`, `question`, `answer`) VALUES ({$post_id}, '{$question}', '{$answer}')");
    }

    public static function get_questions($post_id)
    {
        global $db;

        return DB::returnResults($db->query("SELECT *  FROM dbi_faq WHERE post_id={$post_id}"),true) ?? [];
    }

    public static function update_questions($id, $question, $answer)
    {
        global $db;

        return $db->query("UPDATE dbi_faq SET question = '{$question}', answer = '{$answer} ' WHERE id={$id}");
    }

    public static function remove_questions($id)
    {
        global $db;

        return $db->query("DELETE FROM dbi_faq WHERE id = {$id}");
    }
}