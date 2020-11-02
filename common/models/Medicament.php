<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "medicament".
 *
 * @property int $id
 * @property int|null $external_id
 * @property string|null $title
 * @property int|null $type
 * @property string|null $inn
 * @property string|null $atc
 * @property string|null $dosage
 */
class Medicament extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['external_id', 'type'], 'integer'],
            [['dosage'], 'string'],
            [['title', 'inn', 'atc'], 'string', 'max' => 255],
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
            'inn' => 'Inn',
            'atc' => 'Atc',
            'dosage' => 'Dosage',
        ];
    }
}
