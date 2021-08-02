<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_gemp_teaching".
 *
 * @property int $teaching_evaluation_id
 * @property int $teacher_emp_id
 * @property int $grade
 * @property string $subject
 *
 * @property Employee $teacherEmp
 * @property EvaluationMarksTeaching[] $evaluationMarksTeachings
 */
class EvaluationGempTeaching extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_gemp_teaching';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teacher_emp_id', 'grade'], 'integer'],
            [['subject'], 'string'],
            [['teacher_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['teacher_emp_id' => 'employee_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'teaching_evaluation_id' => 'Teaching Evaluation ID',
            'teacher_emp_id' => 'Teacher Emp ID',
            'grade' => 'Grade',
            'subject' => 'Subject',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherEmp()
    {
        return $this->hasOne(Employee::className(), ['employee_id' => 'teacher_emp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationMarksTeachings()
    {
        return $this->hasMany(EvaluationMarksTeaching::className(), ['evaluation_gemp_teaching_id' => 'teaching_evaluation_id']);
    }
}
