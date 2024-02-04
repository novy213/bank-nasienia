<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "magazyn".
 *
 * @property int $id
 * @property int|null $nr_faktury
 * @property string|null $data
 * @property int|null $ilosc
 * @property int|null $buhaj_id
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
            [['nr_faktury', 'ilosc', 'buhaj_id'], 'integer'],
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
            'nr_faktury' => 'Nr Faktury',
            'data' => 'Data',
            'ilosc' => 'Ilosc',
            'buhaj_id' => 'Buhaj ID',
        ];
    }
}
