<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subject_gemp}}".
 *
 * @property int $subject_id
 * @property int $evalution_index_sub_id
 * @property string $grade_section
 * @property string $is_group
 * @property string $group_name
 *
 * @property TeacherEvaluationProposalGemp[] $teacherEvaluationProposalGemps
 */
class SubjectGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%subject_gemp}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evalution_index_sub_id'], 'integer'],
            [['grade_section', 'is_group', 'group_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'evalution_index_sub_id' => 'Evalution Index Sub ID',
            'grade_section' => 'Grade Section',
            'is_group' => 'Is Group',
            'group_name' => 'Group Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}
