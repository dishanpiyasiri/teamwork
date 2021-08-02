<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "school_project".
 *
 * @property int $project_id
 * @property string $project_name
 * @property string $project_type
 */
class SchoolProject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'school_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_name', 'project_type'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'project_name' => 'Project Name',
            'project_type' => 'Project Type',
        ];
    }
}
