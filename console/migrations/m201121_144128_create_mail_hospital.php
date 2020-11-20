<?php

use yii\db\Migration;

class m201121_144128_create_mail_hospital extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%mail_hospital}}', [
            'id' => $this->primaryKey(),
            'rergion' => $this->string(255),
            'hospital' => $this->text(),
            'address' => $this->text(),
            'phone' => $this->string(255),
            'email' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%mail_hospital}}');
    }
}
