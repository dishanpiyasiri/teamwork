<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property int $pro_id Province Id
 * @property string $pro_name Name Of Province
 *
 * @property EduZone[] $eduZones
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id'], 'required'],
            [['pro_id'], 'integer'],
            [['pro_name'], 'string', 'max' => 50],
            [['pro_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'pro_name' => 'Pro Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEduZones()
    {
        return $this->hasMany(EduZone::className(), ['pro_id' => 'pro_id']);
    }
}
