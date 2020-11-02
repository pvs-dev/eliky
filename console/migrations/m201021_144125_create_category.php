<?php

use yii\db\Migration;

class m201021_144125_create_category extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'title' => $this->string(255),
            'type' => $this->integer(1),
            'group' => $this->integer(1),
            'hospital_id' => $this->integer(11),
            'hospital_title' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%category}}');
    }
}
