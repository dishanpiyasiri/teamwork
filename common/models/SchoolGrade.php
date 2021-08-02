<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "school_grade".
 *
 * @property int $grade_id Grade Id
 * @property string $description School Grade
 */
class SchoolGrade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_id'], 'required'],
            [['grade_id'], 'integer'],
            [['description'], 'string', 'max' => 20],
            [['grade_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grade_id' => 'Grade ID',
            'description' => 'Description',
        ];
    }
}
