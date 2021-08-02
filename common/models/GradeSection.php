<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grade_section".
 *
 * @property int $grade_section_id Grade Section Id
 * @property string $grade_section_name Grade Section
 */
class GradeSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grade_section_name'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grade_section_id' => 'Grade Section ID',
            'grade_section_name' => 'Grade Section Name',
        ];
    }
}
