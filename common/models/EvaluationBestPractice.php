<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_best_practice".
 *
 * @property int $best_practice_id
 * @property int $criteria_id
 * @property int $evaluation_header_id
 * @property string $best_practice_details
 *
 * @property EvaluationCriteria $criteria
 * @property EvaluationHeader $evaluationHeader
 */
class EvaluationBestPractice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_best_practice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['criteria_id', 'evaluation_header_id', 'best_practice_details'], 'required'],
            [['criteria_id', 'evaluation_header_id'], 'integer'],
            [['best_practice_details'], 'string'],
            [['criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationCriteria::className(), 'targetAttribute' => ['criteria_id' => 'criteria_id']],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'best_practice_id' => 'Best Practice ID',
            'criteria_id' => 'Criteria ID',
            'evaluation_header_id' => 'Evaluation Header ID',
            'best_practice_details' => 'Best Practice Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriteria()
    {
        return $this->hasOne(EvaluationCriteria::className(), ['criteria_id' => 'criteria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationHeader()
    {
        return $this->hasOne(EvaluationHeader::className(), ['header_id' => 'evaluation_header_id']);
    }
}
