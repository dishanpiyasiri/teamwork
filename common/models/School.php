<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property string $cen_no Census Number
 * @property int $zone_id Education Zone
 * @property int $total_teachers
 * @property int $total_student Total Students
 * @property string $school_status School Status
 * @property string $school_name
 * @property string $school_category
 *
 * @property Institute $institute
 * @property EduZone $zone
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $province_id, $district_id,  $zone_id;
    public static function tableName()
    {
        return 'school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cen_no'], 'required'],
            [['zone_id', 'total_teachers', 'total_student'], 'integer'],
            [['school_status', 'school_category'], 'string'],
            [['cen_no'], 'string', 'max' => 8],
            [['school_name'], 'string', 'max' => 150],
            [['cen_no'], 'unique'],
            [['zone_id'], 'exist', 'skipOnError' => true, 'targetClass' => EduZone::className(), 'targetAttribute' => ['zone_id' => 'zone_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cen_no' => 'Cen No',
            'zone_id' => 'Zone',
            'total_teachers' => 'Total Teachers',
            'total_student' => 'Total Student',
            'province_id' => 'Province',
            'school_status' => 'School Status',
            'school_name' => 'School Name',
            'school_category' => 'School Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitute()
    {
        return $this->hasOne(Institute::className(), ['census_no' => 'cen_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZone()
    {
        return $this->hasOne(EduZone::className(), ['zone_id' => 'zone_id']);
    }
}
