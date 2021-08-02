<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_criteria_gemp".
 *
 * @property int $criteria_id
 * @property string $criteria_name_sinhala
 * @property string $criteria_name_tamil
 * @property string $criteria_name_english
 *
 * @property EvaluationIndexGemp[] $evaluationIndexGemps
 */
class EvaluationCriteriaGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_criteria_gemp';
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
    public function getEvaluationIndexGemps()
    {
        return $this->hasMany(EvaluationIndexGemp::className(), ['criteria_id' => 'criteria_id']);
    }
}
