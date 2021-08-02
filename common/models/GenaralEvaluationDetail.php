<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "genaral_evaluation_detail".
 *
 * @property int $detail_id
 * @property int $evaluation_header_id
 * @property int $evaluation_index_id
 * @property string $investigated_strenths
 * @property string $investigated_problems
 * @property string $recommandations
 * @property string $implementing_type
 * @property string $implementing_time
 *
 * @property EvaluationHeader $evaluationHeader
 * @property EvaluationIndex $evaluationIndex
 */
class GenaralEvaluationDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genaral_evaluation_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id', 'evaluation_index_id'], 'integer'],
            [['investigated_strenths', 'investigated_problems', 'recommandations', 'implementing_type', 'implementing_time'], 'string'],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
            [['evaluation_index_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndex::className(), 'targetAttribute' => ['evaluation_index_id' => 'index_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'evaluation_header_id' => 'Evaluation Header',
            'evaluation_index_id' => 'Evaluation Index',
            'investigated_strenths' => 'Investigated Strenths',
            'investigated_problems' => 'Investigated Problems',
            'recommandations' => 'Recommandations',
            'implementing_type' => 'Implementing Type',
            'implementing_time' => 'Implementing Time',
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
    public function getEvaluationIndex()
    {
        return $this->hasOne(EvaluationIndex::className(), ['index_id' => 'evaluation_index_id']);
    }
}
