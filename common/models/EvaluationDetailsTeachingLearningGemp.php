<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation__details_teaching_learning_gemp".
 *
 * @property int $evaluation_header_id
 * @property string $teacher_nic
 * @property int $evaluation_index_id
 * @property string $marks
 *
 * @property EvaluationIndexGemp $evaluationIndex
 */
class EvaluationDetailsTeachingLearningGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation__details_teaching_learning_gemp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id'], 'required'],
            [['evaluation_header_id', 'evaluation_index_id'], 'integer'],
            [['marks'], 'number'],
            [['teacher_nic'], 'string', 'max' => 12],
            [['evaluation_header_id'], 'unique'],
            [['evaluation_index_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndexGemp::className(), 'targetAttribute' => ['evaluation_index_id' => 'index_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evaluation_header_id' => 'Evaluation Header ID',
            'teacher_nic' => 'Teacher Nic',
            'evaluation_index_id' => 'Evaluation Index ID',
            'marks' => 'Marks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationIndex()
    {
        return $this->hasOne(EvaluationIndexGemp::className(), ['index_id' => 'evaluation_index_id']);
    }
}
