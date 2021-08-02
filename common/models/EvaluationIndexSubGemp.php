<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_index_sub_gemp".
 *
 * @property int $index_sub_id
 * @property int $evaluation_index_id
 * @property string $index_sub_sinhala
 * @property string $index_sub_tamil
 * @property string $index_sub_english
 *
 * @property EvaluationIndexGemp $evaluationIndex
 * @property EvaluationMarksGemp[] $evaluationMarksGemps
 */
class EvaluationIndexSubGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_index_sub_gemp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_index_id', 'index_sub_sinhala', 'index_sub_tamil', 'index_sub_english'], 'required'],
            [['evaluation_index_id'], 'integer'],
            [['index_sub_sinhala', 'index_sub_tamil', 'index_sub_english'], 'string'],
            [['evaluation_index_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndexGemp::className(), 'targetAttribute' => ['evaluation_index_id' => 'index_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'index_sub_id' => 'Index Sub ID',
            'evaluation_index_id' => 'Evaluation Index ID',
            'index_sub_sinhala' => 'Index Sub Sinhala',
            'index_sub_tamil' => 'Index Sub Tamil',
            'index_sub_english' => 'Index Sub English',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationIndex()
    {
        return $this->hasOne(EvaluationIndexGemp::className(), ['index_id' => 'evaluation_index_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationMarksGemps()
    {
        return $this->hasMany(EvaluationMarksGemp::className(), ['evaluation_index_sub_id' => 'index_sub_id']);
    }
}
