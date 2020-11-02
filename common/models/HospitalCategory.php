<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital_category".
 *
 * @property int $id
 * @property int|null $external_id
 * @property int|null $hospital_id
 * @property int|null $income_category_id
 * @property string|null $income_category_title
 * @property int|null $distribution_category_id
 * @property string|null $distribution_category_title
 */
class HospitalCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'hospital_id', 'income_category_id', 'distribution_category_id'], 'integer'],
            [['income_category_title', 'distribution_category_title'], 'string', 'max' => 255],
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
            'income_category_id' => 'Income Category ID',
            'income_category_title' => 'Income Category Title',
            'distribution_category_id' => 'Distribution Category ID',
            'distribution_category_title' => 'Distribution Category Title',
        ];
    }
}
