<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital".
 *
 * @property int $id
 * @property int|null $external_id
 * @property string|null $title
 * @property string|null $phone
 * @property string|null $edrpou
 * @property int|null $region_id
 * @property string|null $region_title
 * @property int|null $locality_id
 * @property string|null $locality_title
 * @property string|null $locality_type
 * @property string|null $address
 * @property string|null $location_geo_lat
 * @property string|null $location_geo_lng
 */
class Hospital extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'region_id', 'locality_id'], 'integer'],
            [['title', 'region_title', 'locality_title', 'locality_type', 'address'], 'string', 'max' => 255],
            [['phone', 'edrpou', 'location_geo_lat', 'location_geo_lng'], 'string', 'max' => 55],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'external_id' => 'External ID',
            'title' => 'Title',
            'phone' => 'Phone',
            'edrpou' => 'Edrpou',
            'region_id' => 'Region ID',
            'region_title' => 'Region Title',
            'locality_id' => 'Locality ID',
            'locality_title' => 'Locality Title',
            'locality_type' => 'Locality Type',
            'address' => 'Address',
            'location_geo_lat' => 'Location Geo Lat',
            'location_geo_lng' => 'Location Geo Lng',
        ];
    }
}
