<?php

use yii\db\Migration;

class m201021_144124_create_package extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%package}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'title' => $this->string(255),
            'description' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%package}}');
    }
}
