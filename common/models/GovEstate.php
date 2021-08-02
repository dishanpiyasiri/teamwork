<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gov_estate".
 *
 * @property int $gov_estate_id Government Estate Id
 * @property string $gov_estate_status Government Or Estate Status
 */
class GovEstate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gov_estate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gov_estate_id'], 'required'],
            [['gov_estate_id'], 'integer'],
            [['gov_estate_status'], 'string', 'max' => 30],
            [['gov_estate_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gov_estate_id' => 'Gov Estate ID',
            'gov_estate_status' => 'Gov Estate Status',
        ];
    }
}
