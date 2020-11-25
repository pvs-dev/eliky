<?php

use yii\db\Migration;

class m201125_155025_add_create_at_emails extends Migration
{
    public function up()
    {
        $this->addColumn('email','created_at', $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'));
    }

    public function down()
    {
        $this->dropColumn('email','created_at');
    }
}
