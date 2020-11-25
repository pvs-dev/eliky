<?php

use yii\db\Migration;

class m201125_163212_add_rating_hospital extends Migration
{
    public function up()
    {
        $this->addColumn('mail_hospital','rating', $this->double());

    }

    public function down()
    {
        $this->dropColumn('mail_hospital', 'rating');
    }
}
