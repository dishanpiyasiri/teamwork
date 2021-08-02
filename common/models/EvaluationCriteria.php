<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_criteria".
 *
 * @property int $criteria_id
 * @property string $criteria_name_sinhala
 * @property string $criteria_name_tamil
 * @property string $criteria_name_english
 *
 * @property EvaluationBestPractice[] $evaluationBestPractices
 * @property EvaluationIndex[] $evaluationIndices
 * @property EvaluationSummary[] $evaluationSummaries
 */
class EvaluationCriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_criteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['criteria_id'], 'required'],
            [['criteria_id'], 'integer'],
            [['criteria_name_sinhala', 'criteria_name_tamil', 'criteria_name_english'], 'string'],
            [['criteria_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'criteria_id' => 'Criteria ID',
            'criteria_name_sinhala' => 'Criteria Name Sinhala',
            'criteria_name_tamil' => 'Criteria Name Tamil',
            'criteria_name_english' => 'Criteria Name English',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationBestPractices()
    {
        return $this->hasMany(EvaluationBestPractice::className(), ['criteria_id' => 'criteria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationIndices()
    {
        return $this->hasMany(EvaluationIndex::className(), ['criteria_id' => 'criteria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationSummaries()
    {
        return $this->hasMany(EvaluationSummary::className(), ['criteria_id' => 'criteria_id']);
    }
}
