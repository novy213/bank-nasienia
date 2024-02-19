<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "version".
 *
 * @property string|null $version
 */
class Version extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'version';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['version'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'version' => 'Version',
        ];
    }
}
