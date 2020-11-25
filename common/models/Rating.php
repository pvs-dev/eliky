<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int|null $hospital_id
 * @property int|null $rating
 * @property string|null $name
 * @property string|null $device_id
 * @property string|null $comment
 * @property string|null $create_at
 *
 * @property MailHospital $hospital
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hospital_id','rating'], 'integer'],
            [['comment'], 'string'],
            [['name', 'device_id'], 'string', 'max' => 255],
            [['hospital_id'], 'exist', 'skipOnError' => true, 'targetClass' => MailHospital::className(), 'targetAttribute' => ['hospital_id' => 'id']],
            [['create_at'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hospital_id' => 'Hospital ID',
            'rating' => 'Rating',
            'name' => 'name',
            'device_id' => 'Device ID',
            'comment' => 'Comment',
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

    public function calcRating(){
        $hospital = $this->hospital;
        $avg_rate = Rating::find()->select('sum(rating)/count(id) as avgRating')->where(['hospital_id'=>$this->hospital_id])->asArray()->scalar();
        $hospital->rating = $avg_rate;
        $hospital->save();
    }
}
