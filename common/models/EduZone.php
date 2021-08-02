<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_zone".
 *
 * @property int $zone_id Education Zone Id
 * @property string $zone_name Education Zone
 * @property int $dis_id District
 * @property int $zonal_id Education Zonal Id
 * @property int $pro_id Province
 *
 * @property EduDiv[] $eduDivs
 * @property Province $pro
 * @property School[] $schools
 */
class EduZone extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_zone';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['zone_id'], 'required'],
            [['zone_id', 'dis_id', 'zonal_id', 'pro_id'], 'integer'],
            [['zone_name'], 'string', 'max' => 45],
            [['zone_id'], 'unique'],
            [['pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['pro_id' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'zone_id' => 'Zone ID',
            'zone_name' => 'Zone Name',
            'dis_id' => 'Dis ID',
            'zonal_id' => 'Zonal ID',
            'pro_id' => 'Pro ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEduDivs()
    {
        return $this->hasMany(EduDiv::className(), ['zone_id' => 'zone_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPro()
    {
        return $this->hasOne(Province::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['zone_id' => 'zone_id']);
    }
}
