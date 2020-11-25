<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $fio
 * @property string|null $text
 * @property int|null $hospital_id
 * @property int|null $checked
 * @property string|null $created_at
 *
 * @property MailHospital $hospital
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'text'], 'string'],
            [['hospital_id', 'checked'], 'integer'],
            [['created_at'], 'safe'],
            [['email', 'phone'], 'string', 'max' => 255],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailHospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone' => 'Phone',
            'fio' => 'Fio',
            'text' => 'Text',
            'hospital_id' => 'Hospital ID',
            'checked' => 'Checked',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Hospital]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospital()
    {
        return $this->hasOne(MailHospital::className(), ['id' => 'hospital_id']);
    }
}
