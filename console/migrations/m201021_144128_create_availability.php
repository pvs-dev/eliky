<?php

use yii\db\Migration;

class m201021_144128_create_availability extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%availability}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'hospital_id' => $this->integer(11),
            'title' => $this->string(255),
            'type' => $this->integer(1),
            'dosage_form' => $this->text(),
            'custom_dosage_form' => $this->string(255),
            'package_id' => $this->integer(11),
            'package_title' => $this->string(255),
            'date' => $this->string(55),
            'quantities_hospital_category_id' => $this->integer(11),
            'quantities_value' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%availability}}');
    }
}
