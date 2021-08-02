<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gs_div".
 *
 * @property int $gs_div_id Grama Seva Division Id
 * @property string $gs_div_name Grama Seva Division
 * @property string $gs_div_code Grama Seve Code
 * @property int $ds_office_id Divisional Secretary Division
 *
 * @property Institute[] $institutes
 * @property School[] $schools
 */
class GsDiv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gs_div';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ds_office_id'], 'integer'],
            [['gs_div_name'], 'string', 'max' => 45],
            [['gs_div_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gs_div_id' => 'Gs Div ID',
            'gs_div_name' => 'Gs Div Name',
            'gs_div_code' => 'Gs Div Code',
            'ds_office_id' => 'Ds Office ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitutes()
    {
        return $this->hasMany(Institute::className(), ['gs_div_id' => 'gs_div_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['gs_div_id' => 'gs_div_id']);
    }
}
