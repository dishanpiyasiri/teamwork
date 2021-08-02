<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_instruction".
 *
 * @property int $instruction_id
 * @property int $evaluation_index_id
 * @property string $instruction_name_sinhala
 * @property string $instruction_name_tamil
 * @property string $instruction_name_english
 *
 * @property EvaluationDetail[] $evaluationDetails
 * @property EvaluationIndex $evaluationIndex
 */
class EvaluationInstruction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_instruction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_index_id'], 'integer'],
            [['instruction_name_sinhala', 'instruction_name_tamil', 'instruction_name_english'], 'string'],
            [['evaluation_index_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndex::className(), 'targetAttribute' => ['evaluation_index_id' => 'index_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'instruction_id' => 'Instruction ID',
            'evaluation_index_id' => 'Evaluation Index',
            'instruction_name_sinhala' => 'Instruction Name Sinhala',
            'instruction_name_tamil' => 'Instruction Name Tamil',
            'instruction_name_english' => 'Instruction Name English',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationDetails()
    {
        return $this->hasMany(EvaluationDetail::className(), ['evaluation_instruction_id' => 'instruction_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationIndex()
    {
        return $this->hasOne(EvaluationIndex::className(), ['index_id' => 'evaluation_index_id']);
    }
    public function getEvaluationInstructionsById($id){
        return $this->find()->where(['evaluation_index_id'=>$id])->all(); //die();
        //return $this->hasMany(EvaluationDetail::className(), ['evaluation_instruction_id' => 'instruction_id']);
        //return $this->find()->where(['evaluation_index_id'=>'$id'])->all();
    }
    public function getEvaluationInstructionsById1($id)
    {
        //echo $id;
        $ev_id = $id;
        return $this->hasMany(['evaluation_index_id' => $ev_id]);
    }
}
