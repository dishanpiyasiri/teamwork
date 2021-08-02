<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "evaluation_header".
 *
 * @property int $header_id
 * @property string $evaluation_type
 * @property string $school_census
 * @property int $evaluation_year
 * @property string $evaluation_term
 * @property string $evaluated_date
 * @property int $teachers_count
 * @property double $seqi
 * @property string $special_notes
 * @property string $project_type
 *
 * @property EvaluationBestPractice[] $evaluationBestPractices
 * @property EvaluationDetail[] $evaluationDetails
 * @property EvaluationSummary[] $evaluationSummaries
 * @property GenaralEvaluationDetail[] $genaralEvaluationDetails
 */
class EvaluationHeader extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluation_header';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluation_type', 'evaluation_term', 'special_notes', 'project_type'], 'string'],
            [['evaluated_date'], 'safe'],
            [['seqi'], 'number'],
            [['school_census'], 'string', 'max' => 10],
            [['evaluation_year'],'integer','min'=>2019, 'max'=>2030],
            [['teachers_count'],'integer', 'min'=>1, 'max'=>999]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'header_id' => 'Header ID',
            'evaluation_type' => 'Evaluation Type',
            'school_census' => 'School Census',
            'evaluation_year' => 'Evaluation Year',
            'evaluation_term' => 'Evaluation Term',
            'evaluated_date' => 'Evaluated Date',
            'teachers_count' => 'No of Teachers',
            'seqi' => 'Seqi',
            'special_notes' => 'Special Notes',
            'project_type' => 'Project Type',
        ];
    }
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['cen_no' => 'school_census']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationBestPractices()
    {
        return $this->hasMany(EvaluationBestPractice::className(), ['evaluation_header_id' => 'header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationDetails()
    {
        return $this->hasMany(EvaluationDetail::className(), ['evaluation_header_id' => 'header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluationSummaries()
    {
        return $this->hasMany(EvaluationSummary::className(), ['evaluation_header_id' => 'header_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenaralEvaluationDetails()
    {
        return $this->hasMany(GenaralEvaluationDetail::className(), ['evaluation_header_id' => 'header_id']);
    }

    public static function getInspectionCount($ptype) {
        $Count = EvaluationHeader::find() 
               ->where(['project_type'=> $ptype])              
                ->count();
        return $Count;
    }
    
    public static function getInspectedSchoolCount($ptype) {
        $Count = EvaluationHeader::find()
               ->where(['project_type'=> $ptype])
                ->select('school_census')
                ->distinct()
                ->count('school_census');
        return $Count;
    }

    public static function getInspectionCountByProject($ptype) {
        $Count = EvaluationHeader::find() 
               ->where(['project_type'=> $ptype])              
                ->count();
        return $Count;

    }
    

}
