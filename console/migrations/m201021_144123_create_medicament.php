<?php

use yii\db\Migration;

class m201021_144123_create_medicament extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%medicament}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'title' => $this->string(255),
            'type' => $this->integer(1),
            'inn' => $this->string(255),
            'atc' => $this->string(255),
            'dosage' => $this->text(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%medicament}}');
    }
}
