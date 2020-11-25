<?php

use yii\db\Migration;

class m201125_161233_create_rating extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%rating}}', [
            'id' => $this->primaryKey(),
            'hospital_id' => $this->integer(11),
            'rating' => $this->integer(11),
            'email' => $this->string(255),
            'device_id' => $this->string(255),
            'comment' => $this->text(),
            'create_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);

        $this->addForeignKey('FK_rating_hospital_id', 'rating', 'hospital_id', 'mail_hospital', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('FK_rating_hospital_id','rating');
        $this->dropTable('rating');
    }
}
