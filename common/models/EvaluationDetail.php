<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_detail".
 *
 * @property int $detail_id
 * @property int $evaluation_header_id
 * @property int $evaluation_instruction_id
 * @property double $evaluation_mark
 *
 * @property EvaluationHeader $evaluationHeader
 * @property EvaluationInstruction $evaluationInstruction
 */
class EvaluationDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_header_id', 'evaluation_instruction_id'], 'integer'],
            [['evaluation_mark'], 'number'],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
            [['evaluation_instruction_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationInstruction::className(), 'targetAttribute' => ['evaluation_instruction_id' => 'instruction_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'evaluation_header_id' => 'Evaluation Header ID',
            'evaluation_instruction_id' => 'Evaluation Instruction ID',
            'evaluation_mark' => 'Evaluation Mark',
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
    public function getEvaluationInstruction()
    {
        return $this->hasOne(EvaluationInstruction::className(), ['instruction_id' => 'evaluation_instruction_id']);
    }
}
