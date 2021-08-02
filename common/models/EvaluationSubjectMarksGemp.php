<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_subject_marks_gemp".
 *
 * @property int $evaluation_subject_marks_id
 * @property int $evaluation_header_id
 * @property int $evaluation_index_sub_id
 * @property int $grade
 * @property string $marks
 *
 * @property EvaluationIndexSubGemp $evaluationIndexSub
 */
class EvaluationSubjectMarksGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_subject_marks_gemp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id', 'evaluation_index_sub_id', 'grade'], 'integer'],
            [['marks'], 'number'],
            [['evaluation_index_sub_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndexSubGemp::className(), 'targetAttribute' => ['evaluation_index_sub_id' => 'index_sub_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'evaluation_subject_marks_id' => 'Evaluation Subject Marks ID',
            'evaluation_header_id' => 'Evaluation Header ID',
            'evaluation_index_sub_id' => 'Evaluation Index Sub ID',
            'grade' => 'Grade',
            'marks' => 'Marks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationIndexSub()
    {
        return $this->hasOne(EvaluationIndexSubGemp::className(), ['index_sub_id' => 'evaluation_index_sub_id']);
    }
}
