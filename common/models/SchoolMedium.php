<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "school_medium".
 *
 * @property int $language_medium_id Language Medium Id
 * @property string $census_no Census Number
 * @property int $school_medium_id School Language Medium
 *
 * @property School $censusNo
 */
class SchoolMedium extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_medium';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language_medium_id', 'census_no'], 'required'],
            [['language_medium_id'], 'integer'],
            [['census_no'], 'string', 'max' => 8],
            [['census_no'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['census_no' => 'cen_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'language_medium_id' => 'Language Medium ID',
            'census_no' => 'Census No',
            'school_medium_id' => 'School Medium ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCensusNo()
    {
        return $this->hasOne(School::className(), ['cen_no' => 'census_no']);
    }
}
