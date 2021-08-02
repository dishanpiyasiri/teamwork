<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sch_category".
 *
 * @property int $sch_category_Id School Category Map Id
 * @property int $category_id Category
 * @property string $census_no Census Number
 *
 * @property School $censusNo
 */
class SchCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sch_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
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
            'sch_category_Id' => 'Sch Category ID',
            'category_id' => 'Category ID',
            'census_no' => 'Census No',
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
