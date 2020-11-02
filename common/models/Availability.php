<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "availability".
 *
 * @property int $id
 * @property int|null $external_id
 * @property int|null $hospital_id
 * @property string|null $title
 * @property int|null $type
 * @property string|null $dosage_form
 * @property string|null $custom_dosage_form
 * @property int|null $package_id
 * @property string|null $package_title
 * @property string|null $date
 * @property int|null $quantities_hospital_category_id
 * @property string|null $quantities_value
 */
class Availability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'availability';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'hospital_id', 'type', 'package_id', 'quantities_hospital_category_id'], 'integer'],
            [['dosage_form'], 'string'],
            [['title', 'custom_dosage_form', 'package_title', 'quantities_value'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 55],
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
            'hospital_id' => 'Hospital ID',
            'title' => 'Title',
            'type' => 'Type',
            'dosage_form' => 'Dosage Form',
            'custom_dosage_form' => 'Custom Dosage Form',
            'package_id' => 'Package ID',
            'package_title' => 'Package Title',
            'date' => 'Date',
            'quantities_hospital_category_id' => 'Quantities Hospital Category ID',
            'quantities_value' => 'Quantities Value',
        ];
    }
}
