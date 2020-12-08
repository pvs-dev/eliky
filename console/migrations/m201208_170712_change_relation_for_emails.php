<?php

use yii\db\Migration;

class m201208_170712_change_relation_for_emails extends Migration
{
    public function up()
    {
        $this->dropForeignKey('FK_email_hospital_id','email');
        $this->addForeignKey('FK_email_hospital_id', 'email', 'hospital_id', 'mail_hospital', 'id', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('FK_email_hospital_id','email');
        $this->addForeignKey('FK_email_hospital_id', 'email', 'hospital_id', 'mail_hospital', 'id');
    }
}
