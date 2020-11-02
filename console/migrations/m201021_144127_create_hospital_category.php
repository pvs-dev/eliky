<?php

use yii\db\Migration;

class m201021_144127_create_hospital_category extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%hospital_category}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'hospital_id' => $this->integer(11),
            'income_category_id' => $this->integer(11),
            'income_category_title' => $this->string(255),
            'distribution_category_id' => $this->integer(11),
            'distribution_category_title' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%hospital_category}}');
    }
}
