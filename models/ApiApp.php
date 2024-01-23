<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "api_app".
 *
 * @property string|null $app_token
 * @property string|null $app_name
 */
class ApiApp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_token', 'app_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'app_token' => 'App Token',
            'app_name' => 'App Name',
        ];
    }
}
