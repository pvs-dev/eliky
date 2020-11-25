<?php

use yii\db\Migration;

class m201125_075412_create_emails extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%email}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255),
            'phone' => $this->string(255),
            'fio' => $this->text(),
            'text' => $this->text(),
            'hospital_id' => $this->integer(11),
            'checked' => $this->boolean(),
        ], $tableOptions);

        $this->addForeignKey('FK_email_hospital_id', 'email', 'hospital_id', 'mail_hospital', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_email_hospital_id','email');
        $this->dropTable('email');
    }
}
