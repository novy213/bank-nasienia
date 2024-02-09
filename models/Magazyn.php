<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "magazyn".
 *
 * @property int $id
 * @property string|null $nr_faktury
 * @property string|null $data
 * @property int|null $ilosc
 * @property int|null $buhaj_id
 * @property string|null $data_pobrania
 */
class Magazyn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'magazyn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nr_faktury', 'data'], 'string'],
            [['ilosc', 'buhaj_id'], 'integer'],
            [['data_pobrania'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nr_faktury' => 'Nr Faktury',
            'data' => 'Data',
            'ilosc' => 'Ilosc',
            'buhaj_id' => 'Buhaj ID',
            'data_pobrania' => 'Data Pobrania',
        ];
    }
}
