<?php

use yii\db\Migration;

class m201021_144122_create_locality extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%locality}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'type' => $this->string(255),
            'district' => $this->string(255),
            'region' => $this->string(255),
            'external_id' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%locality}}');
    }
}
