<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historia_transakcji_przyjecia".
 *
 * @property int $id
 * @property string|null $data
 * @property int|null $buhaj_id
 */
class HistoriaTransakcjiPrzyjecia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historia_transakcji_przyjecia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'buhaj_id' => 'Buhaj ID',
        ];
    }
}
