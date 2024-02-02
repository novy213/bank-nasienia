<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historia_transakcji_wydania".
 *
 * @property int $id
 * @property int|null $klient_id
 * @property string|null $data
 * @property int |null $ilosc
 */
class HistoriaTransakcjiWydania extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historia_transakcji_wydania';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['klient_id', 'ilosc'], 'integer'],
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
            'klient_id' => 'Klient ID',
            'data' => 'Data',
            'ilosc' => 'Ilosc',
        ];
    }
}
