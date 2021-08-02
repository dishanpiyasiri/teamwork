<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sch_gender_cat".
 *
 * @property int $sch_gender_cat_id School Gender Category Id
 * @property string $school_gender_category School Gender Category
 *
 * @property School[] $schools
 */
class SchGenderCat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sch_gender_cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_gender_category'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sch_gender_cat_id' => 'Sch Gender Cat ID',
            'school_gender_category' => 'School Gender Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['sch_gender_category_id' => 'sch_gender_cat_id']);
    }
}
