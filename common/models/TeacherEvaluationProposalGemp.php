<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "teacher_evaluation_proposal_gemp".
 *
 * @property int $id
 * @property int $evaluation_header_id
 * @property int $teacher_emp_id
 * @property int $subject_id
 * @property int $grade
 * @property string $fact_to_disclose
 * @property string $development_proposals
 *
 * @property EvaluationHeader $evaluationHeader
 * @property Employee $teacherEmp
 * @property Subject $subject
 */
class TeacherEvaluationProposalGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher_evaluation_proposal_gemp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id', 'teacher_emp_id', 'subject_id', 'grade', 'fact_to_disclose', 'development_proposals'], 'required'],
            [['evaluation_header_id', 'teacher_emp_id', 'subject_id', 'grade'], 'integer'],
            [['fact_to_disclose', 'development_proposals'], 'string'],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
            [['teacher_emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['teacher_emp_id' => 'employee_id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'subject_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evaluation_header_id' => 'Evaluation Header ID',
            'teacher_emp_id' => 'Teacher Emp ID',
            'subject_id' => 'Subject ID',
            'grade' => 'Grade',
            'fact_to_disclose' => 'Fact To Disclose',
            'development_proposals' => 'Development Proposals',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationHeader()
    {
        return $this->hasOne(EvaluationHeader::className(), ['header_id' => 'evaluation_header_id']);
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
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['subject_id' => 'subject_id']);
    }
}
