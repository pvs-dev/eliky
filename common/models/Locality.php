<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "locality".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $type
 * @property string|null $district
 * @property string|null $region
 * @property int|null $external_id
 */
class Locality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'locality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id'], 'integer'],
            [['title', 'type', 'district', 'region'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'type' => 'Type',
            'district' => 'District',
            'region' => 'Region',
            'external_id' => 'External ID',
        ];
    }
}
