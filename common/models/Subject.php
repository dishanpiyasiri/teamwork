<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $subject_id
 * @property string $subject_name_sinhala
 * @property string $subject_name_tamil
 * @property string $subject_name_english
 *
 * @property TeacherEvaluationProposalGemp[] $teacherEvaluationProposalGemps
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_name_sinhala', 'subject_name_tamil', 'subject_name_english'], 'required'],
            [['subject_name_sinhala', 'subject_name_tamil', 'subject_name_english'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'subject_id' => 'Subject ID',
            'subject_name_sinhala' => 'Subject Name Sinhala',
            'subject_name_tamil' => 'Subject Name Tamil',
            'subject_name_english' => 'Subject Name English',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherEvaluationProposalGemps()
    {
        return $this->hasMany(TeacherEvaluationProposalGemp::className(), ['subject_id' => 'subject_id']);
    }
}
