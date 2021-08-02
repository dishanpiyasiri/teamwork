<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grade_category".
 *
 * @property int $grade_cat_id Grade Category Id
 * @property string $grade_category_name Grade Category
 *
 * @property School[] $schools
 */
class GradeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_category_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grade_cat_id' => 'Grade Cat ID',
            'grade_category_name' => 'Grade Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchools()
    {
        return $this->hasMany(School::className(), ['sch_grade_category_id' => 'grade_cat_id']);
    }
}
