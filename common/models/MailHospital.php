<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mail_hospital".
 *
 * @property int $id
 * @property string|null $rergion
 * @property string|null $hospital
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property float|null $rating
 *
 * @property Email[] $emails
 * @property Rating[] $ratings
 */
class MailHospital extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_hospital';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hospital', 'address'], 'string'],
            [['rating'], 'number'],
            [['rergion', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rergion' => 'Rergion',
            'hospital' => 'Hospital',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'rating' => 'Rating',
        ];
    }

    /**
     * Gets query for [[Emails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['hospital_id' => 'id']);
    }

    /**
     * Gets query for [[Ratings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRatings()
    {
        return $this->hasMany(Rating::className(), ['hospital_id' => 'id']);
    }
}
