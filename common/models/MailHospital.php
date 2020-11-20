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
            'rergion' => 'Район',
            'hospital' => 'Медичний заклад',
            'address' => 'Адреса',
            'phone' => 'Телефон',
            'email' => 'Електронна адреса',
        ];
    }
}
