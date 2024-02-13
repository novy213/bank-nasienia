<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "magazyn_ilosc".
 *
 * @property int|null $id
 * @property int|null $buhaj_id
 * @property int|null $ilosc
 */
class MagazynIlosc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'magazyn_ilosc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buhaj_id', 'ilosc'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buhaj_id' => 'Buhaj ID',
            'ilosc' => 'Ilosc',
        ];
    }
}
