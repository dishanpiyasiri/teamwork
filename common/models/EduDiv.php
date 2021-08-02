<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_div".
 *
 * @property int $div_id Education Division Id
 * @property string $div_name Education Division Name
 * @property int $zone_id Education Zone
 *
 * @property EduZone $zone
 */
class EduDiv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_div';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['div_id', 'zone_id'], 'required'],
            [['div_id', 'zone_id'], 'integer'],
            [['div_name'], 'string', 'max' => 45],
            [['div_id'], 'unique'],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduZone::className(), 'targetAttribute' => ['zone_id' => 'zone_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'div_id' => 'Div ID',
            'div_name' => 'Div Name',
            'zone_id' => 'Zone ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(EduZone::className(), ['zone_id' => 'zone_id']);
    }
}
