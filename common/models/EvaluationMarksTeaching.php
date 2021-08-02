<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_marks_teaching".
 *
 * @property int $evaluation_marks_teaching_id
 * @property int $marks_id
 * @property int $evaluation_gemp_teaching_id
 *
 * @property EvaluationMarksGemp $marks
 * @property EvaluationGempTeaching $evaluationGempTeaching
 */
class EvaluationMarksTeaching extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_marks_teaching';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marks_id', 'evaluation_gemp_teaching_id'], 'integer'],
            [['marks_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationMarksGemp::className(), 'targetAttribute' => ['marks_id' => 'marks_id']],
            [['evaluation_gemp_teaching_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationGempTeaching::className(), 'targetAttribute' => ['evaluation_gemp_teaching_id' => 'teaching_evaluation_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evaluation_marks_teaching_id' => 'Evaluation Marks Teaching ID',
            'marks_id' => 'Marks ID',
            'evaluation_gemp_teaching_id' => 'Evaluation Gemp Teaching ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarks()
    {
        return $this->hasOne(EvaluationMarksGemp::className(), ['marks_id' => 'marks_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationGempTeaching()
    {
        return $this->hasOne(EvaluationGempTeaching::className(), ['teaching_evaluation_id' => 'evaluation_gemp_teaching_id']);
    }
}
