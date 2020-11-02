<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $external_id
 * @property string|null $title
 * @property int|null $type
 * @property int|null $group
 * @property int|null $hospital_id
 * @property string|null $hospital_title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'type', 'group', 'hospital_id'], 'integer'],
            [['title', 'hospital_title'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'group' => 'Group',
            'hospital_id' => 'Hospital ID',
            'hospital_title' => 'Hospital Title',
        ];
    }
}
