<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $dis_id District Id
 * @property string $dis_name District Name
 * @property int $pro_id Province
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dis_id'], 'required'],
            [['dis_id', 'pro_id'], 'integer'],
            [['dis_name'], 'string', 'max' => 45],
            [['dis_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => 'Dis ID',
            'dis_name' => 'Dis Name',
            'pro_id' => 'Pro ID',
        ];
    }
}
