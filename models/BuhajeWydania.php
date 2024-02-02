<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buhaje_wydania".
 *
 * @property int|null $buhaj_id
 * @property int|null $wydanie_id
 */
class BuhajeWydania extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buhaje_wydania';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buhaj_id', 'wydanie_id'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'buhaj_id' => 'Buhaj ID',
            'wydanie_id' => 'Wydanie ID',
        ];
    }
}
