<?php

use yii\db\Migration;

class m201021_144126_create_hospital extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%hospital}}', [
            'id' => $this->primaryKey(),
            'external_id' => $this->integer(11),
            'title' => $this->string(255),
            'phone' => $this->string(55),
            'edrpou' => $this->string(55),
            'region_id' => $this->integer(11),
            'region_title' => $this->string(255),
            'locality_id' => $this->integer(11),
            'locality_title' => $this->string(255),
            'locality_type' => $this->string(255),
            'address' => $this->string(255),
            'location_geo_lat' => $this->string(55),
            'location_geo_lng' => $this->string(55),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%hospital}}');
    }
}
