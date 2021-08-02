<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_index".
 *
 * @property int $index_id
 * @property int $criteria_id
 * @property string $index_code
 * @property string $index_name_sinhala
 * @property string $index_name_tamil
 * @property string $index_name_english
 *
 * @property EvaluationCriteria $criteria
 * @property EvaluationInstruction[] $evaluationInstructions
 * @property GenaralEvaluationDetail[] $genaralEvaluationDetails
 */
class EvaluationIndex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_index';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['criteria_id'], 'integer'],
            [['index_name_sinhala', 'index_name_tamil', 'index_name_english'], 'string'],
            [['index_code'], 'string', 'max' => 10],
            [['criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationCriteria::className(), 'targetAttribute' => ['criteria_id' => 'criteria_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'index_id' => 'Index ID',
            'criteria_id' => 'Criteria',
            'index_code' => 'Index Code',
            'index_name_sinhala' => 'Index Name Sinhala',
            'index_name_tamil' => 'Index Name Tamil',
            'index_name_english' => 'Index Name English',
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
    public function getEvaluationInstructions()
    {
        return $this->hasMany(EvaluationInstruction::className(), ['evaluation_index_id' => 'index_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenaralEvaluationDetails()
    {
        return $this->hasMany(GenaralEvaluationDetail::className(), ['evaluation_index_id' => 'index_id']);
    }
}
