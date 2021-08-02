<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_summary".
 *
 * @property int $summary_id
 * @property int $evaluation_header_id
 * @property int $criteria_id
 * @property string $strengths
 * @property string $divisions_to_be_developped
 *
 * @property EvaluationHeader $evaluationHeader
 * @property EvaluationCriteria $criteria
 */
class EvaluationSummary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_summary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id', 'criteria_id'], 'integer'],
            [['strengths', 'divisions_to_be_developped'], 'string'],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
            [['criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationCriteria::className(), 'targetAttribute' => ['criteria_id' => 'criteria_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'summary_id' => 'Summary ID',
            'evaluation_header_id' => 'Evaluation Header',
            'criteria_id' => 'Criteria',
            'strengths' => 'Strengths',
            'divisions_to_be_developped' => 'Divisions To Be Developped',
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
    public function getCriteria()
    {
        return $this->hasOne(EvaluationCriteria::className(), ['criteria_id' => 'criteria_id']);
    }
}
