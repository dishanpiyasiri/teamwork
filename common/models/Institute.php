<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "institute".
 *
 * @property int $institute_id Institute Id
 * @property string $census_no Census Number
 * @property string $name Institute Name
 * @property string $address Address
 * @property string $telephone Telephone Number
 * @property string $email E-mail
 * @property string $web Web
 * @property string $type Institute Type
 * @property int $edu_div_id Education Division
 * @property int $emp_count Employees Count
 *
 * @property School $censusNo
 */
class Institute extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['institute_id'], 'required'],
            [['institute_id', 'edu_div_id', 'emp_count'], 'integer'],
            [['type'], 'string'],
            [['census_no'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 150],
            [['telephone'], 'string', 'max' => 10],
            [['email', 'web'], 'string', 'max' => 45],
            [['census_no'], 'unique'],
            [['institute_id'], 'unique'],
            [['census_no'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['census_no' => 'cen_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'institute_id' => 'Institute ID',
            'census_no' => 'Census No',
            'name' => 'Name',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'web' => 'Web',
            'type' => 'Type',
            'edu_div_id' => 'Edu Div ID',
            'emp_count' => 'Emp Count',
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
