<?php

use yii\db\Migration;

class m201208_170713_add_rating_column extends Migration
{
    public function up()
    {
        $this->addColumn('rating','level', $this->integer(11));
        $this->addColumn('rating','condition', $this->integer(11));
        $this->addColumn('rating','availability', $this->integer(11));
        $this->addColumn('rating','attitude', $this->integer(11));
        $this->alterColumn('rating', 'rating', $this->double());

    }

    public function down()
    {
        $this->dropColumn('rating', 'level');
        $this->dropColumn('rating', 'condition');
        $this->dropColumn('rating', 'availability');
        $this->dropColumn('rating', 'attitude');
        $this->alterColumn('rating', 'rating', $this->integer(11));

    }
}
