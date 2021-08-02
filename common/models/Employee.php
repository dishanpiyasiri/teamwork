<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $employee_id Employee Id
 * @property string $nic NIC
 * @property string $title Title
 * @property string $name_with_initials Name With Initials
 * @property string $subject
 *
 * @property EvaluationGempTeaching[] $evaluationGempTeachings
 * @property TeacherEvaluationProposalGemp[] $teacherEvaluationProposalGemps
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nic'], 'required'],
            [['title'], 'string'],
            [['nic'], 'string', 'max' => 12],
            [['name_with_initials'], 'string', 'max' => 200],
            [['nic'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'nic' => 'Nic',
            'title' => 'Title',
            'name_with_initials' => 'Name With Initials',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationGempTeachings()
    {
        return $this->hasMany(EvaluationGempTeaching::className(), ['teacher_emp_id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherEvaluationProposalGemps()
    {
        return $this->hasMany(TeacherEvaluationProposalGemp::className(), ['teacher_emp_id' => 'employee_id']);
    }
}
