<?php

namespace common\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property int|null $hospital_id
 * @property double|null $rating
 * @property string|null $name
 * @property string|null $device_id
 * @property string|null $comment
 * @property string|null $create_at
 * @property integer|null $level
 * @property integer|null $condition
 * @property integer|null $availability
 * @property integer|null $attitude
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
            [['rating'], 'double'],
            [['hospital_id', 'level', 'condition', 'availability', 'attitude'], 'integer'],
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
            'level' => 'level',
            'condition' => 'condition',
            'availability' => 'availability',
            'attitude' => 'attitude',
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

    public function setAverageRating()
    {
        if (!empty($this->level) || !empty($this->condition) || !empty($this->availability) || !empty($this->attitude)) {
            $this->rating = ($this->level + $this->condition + $this->availability + $this->attitude) / 4;
        }
    }

    public function calcRating()
    {
        $hospital = $this->hospital;
        $avg_rate = Rating::find()->select('sum(rating)/count(id) as avgRating')->where(['hospital_id' => $this->hospital_id])->asArray()->scalar();
        $hospital->rating = $avg_rate;
        $hospital->save();
    }
}
