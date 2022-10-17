<?php
class Migrate
{
    public static function add_changed()
    {
        global $db;
        $last_migrate = self::get_last_migrate();

        /**
         * Дополнительные поля для постов
         */
        if ($last_migrate < 20220712192500) {
            $db->query("CREATE TABLE IF NOT EXISTS dbi_migrate (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(80) NOT NULL,
                date VARCHAR(80) NOT NULL)"
            );

            if (DB::returnResults("SHOW COLUMNS FROM `dbi_posts` LIKE \"canonical\"", true) === null) {
                $db->query("ALTER TABLE `dbi_posts` ADD `canonical` varchar(150) NOT NULL DEFAULT '';");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `dbi_posts` LIKE \"redirect_type\"", true) === null) {
                $db->query("ALTER TABLE `dbi_posts` ADD `redirect_type` varchar(150) NOT NULL DEFAULT '';");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `dbi_posts` LIKE \"redirect_url\"", true) === null) {
                $db->query("ALTER TABLE `dbi_posts` ADD `redirect_url` varchar(150) NOT NULL DEFAULT '';");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `dbi_posts` LIKE \"city_id\"", true) === null) {
                $db->query("ALTER TABLE `dbi_posts` ADD `city_id` INT(9) NOT NULL DEFAULT 1;");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `menu` LIKE \"city_id\"", true) === null) {
                $db->query("ALTER TABLE `menu` ADD `city_id` INT(9) NOT NULL DEFAULT 1;");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `langs` LIKE \"city_id\"", true) === null) {
                $db->query("ALTER TABLE `langs` ADD `city_id` INT(9) NOT NULL DEFAULT 1;");
            }
            if (DB::returnResults("SHOW COLUMNS FROM `langs` LIKE \"main_post\"", true) === null) {
                $db->query("ALTER TABLE `langs` ADD `main_post` INT(9) NOT NULL DEFAULT 0;");
            }
            /**
             * Добавление городов
             */
            $db->query("
                CREATE TABLE IF NOT EXISTS regional_cities (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name_uk VARCHAR(80) NOT NULL,
                name_ru VARCHAR(80) NOT NULL,
                name_en VARCHAR(80) NOT NULL,
                url_part VARCHAR(80) NOT NULL,
                state_id INT(9) UNSIGNED NOT NULL,
                header_visible BOOLEAN DEFAULT FALSE
                )"
            );
            DB::returnResults($db->query("ALTER TABLE `regional_cities` ADD UNIQUE (`name_ru`, `name_en`, `name_uk`,`state_id`)"));
            if ($db->query("SELECT name_ru FROM `regional_cities` WHERE name_ru = 'Киев'")->num_rows === 0) {
                $db->query("INSERT INTO regional_cities (id,name_uk,name_ru,name_en,url_part,state_id, header_visible) 
                    VALUES (1,'Київ','Киев', 'Kyiv','',10,true)");
            }

            /**
             * Добавление областей
             */
            $db->query("
                CREATE TABLE IF NOT EXISTS `regional_states` (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name_uk VARCHAR(80) NOT NULL,
                name_ru VARCHAR(80) NOT NULL,
                name_en VARCHAR(80) NOT NULL
                )"
            );

            if ($db->query("SELECT * FROM `regional_states`")->num_rows === 0) {
                $state = json_decode(file_get_contents('migrate_files/regions_ukraine.json'))->state;

                foreach ($state as $s) {
                    $data_insert[] = sprintf("('%s', '%s', '%s')", $s->public_name->uk, $s->public_name->ru, $s->public_name->en);
                }

                $db->query("INSERT INTO `regional_states` (name_uk, name_ru, name_en) VALUES " . implode(', ', $data_insert));
            }
            $data = DB::returnResults($db->query("
                            SELECT dbi_posts.id  FROM `dbi_posts` 
                            where dbi_posts.id not in (SELECT langs.ru FROM langs) and city_id = 1 and lang = 'ru'"),true
            ) ?? false;

            if ($data) {
                foreach ($data as $d) {
                    $data_insert[] = sprintf("('%s')", $d['id']);
                }
                $db->query("INSERT INTO langs (ru) VALUES " . implode(', ', $data_insert));
            }
            $db->query("INSERT INTO dbi_migrate (name,date) VALUES ('Add tables: district,cities. Add additional fields for metatags and regional.','20220712192500')");
        }

        if ($last_migrate < 20220722192500) {
            $db->query("
                CREATE TABLE IF NOT EXISTS dbi_filter_brands (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name_uk VARCHAR(80) NOT NULL,
                name_ru VARCHAR(80) NOT NULL,
                name_en VARCHAR(80) NOT NULL
                )"
            );
            $db->query("
                CREATE TABLE IF NOT EXISTS dbi_filter_materials (
                id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name_uk VARCHAR(80) NOT NULL,
                name_ru VARCHAR(80) NOT NULL,
                name_en VARCHAR(80) NOT NULL
                )"
            );
            $db->query("
                CREATE TABLE IF NOT EXISTS dbi_filters (
                    post_id INT(9) UNSIGNED,
                    type_id INT(9) UNSIGNED,
                    position INT(9) UNSIGNED,
                    type_name VARCHAR(80) NOT NULL,
                    visible BOOLEAN DEFAULT true,
                    value VARCHAR(180) DEFAULT ''  
                    )
            ");
            $db->query("
                CREATE TABLE IF NOT EXISTS dbi_filters_values (
                    post_id INT(9) UNSIGNED NOT NULL UNIQUE,
                    materials VARCHAR(80) NOT NULL DEFAULT '',
                    brands VARCHAR(80) NOT NULL DEFAULT '',
                    sales VARCHAR(80) NOT NULL DEFAULT '',
                    price VARCHAR(80) NOT NULL DEFAULT ''
                )
            ");
            $db->query("
                CREATE TABLE IF NOT EXISTS dbi_faq (
                    id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    post_id INT(9) UNSIGNED NOT NULL,
                    question VARCHAR(80) NOT NULL,
                    answer VARCHAR(280) NOT NULL
                )
            ");

            $db->query("INSERT INTO dbi_migrate (name,date) VALUES ('Add tables: brands','20220722192500')");
        }
        
        $db->close();
    }

    private static function get_last_migrate()
    {
        global $db;

        $result = DB::returnResults($db->query("SELECT * FROM `dbi_migrate` ORDER BY ID DESC LIMIT 1"));
        return $result['date'] ? (int)$result['date'] : 0;
    }
}