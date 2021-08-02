<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_marks_gemp".
 *
 * @property int $marks_id
 * @property int $evaluation_header_id
 * @property int $evaluation_index_sub_id
 * @property double $marks
 *
 * @property EvaluationIndexSubGemp $evaluationIndexSub
 * @property EvaluationHeader $evaluationHeader
 * @property EvaluationMarksTeaching[] $evaluationMarksTeachings
 */
class EvaluationMarksGemp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_marks_gemp';
    }

    /**
     * {@inheritdoc}
     */
    public $teacherid;
    
    public $marksId;
    public $gempTeachingId;
    
    
    public function rules()
    {
        return [
            [['evaluation_header_id', 'evaluation_index_sub_id','teacherid','marksId','gempTeachingId'], 'integer'],
            [['marks'], 'number'],
            [['evaluation_index_sub_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationIndexSubGemp::className(), 'targetAttribute' => ['evaluation_index_sub_id' => 'index_sub_id']],
            [['evaluation_header_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvaluationHeader::className(), 'targetAttribute' => ['evaluation_header_id' => 'header_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'marks_id' => 'Marks ID',
            'evaluation_header_id' => 'Evaluation Header ID',
            'evaluation_index_sub_id' => 'Evaluation Index Sub ID',
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
    public function getEvaluationMarksTeachings()
    {
        return $this->hasMany(EvaluationMarksTeaching::className(), ['marks_id' => 'marks_id']);
    }
}
