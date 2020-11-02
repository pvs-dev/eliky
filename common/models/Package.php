<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property int $id
 * @property int|null $external_id
 * @property string|null $title
 * @property string|null $description
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
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
            'description' => 'Description',
        ];
    }
}
