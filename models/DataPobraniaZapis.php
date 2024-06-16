<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pobrania_zapis".
 *
 * @property int $id
 * @property int|null $archiwum_id
 * @property string|null $date
 * @property int|null $ilosc
 */
class DataPobraniaZapis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pobrania_zapis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['archiwum_id', 'ilosc'], 'integer'],
            [['date'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'archiwum_id' => 'Archiwum ID',
            'date' => 'Data',
            'ilosc' => 'Ilosc',
        ];
    }
}
