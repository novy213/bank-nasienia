<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $imie
 * @property string|null $nazwisko
 * @property string|null $adres_kraj
 * @property string|null $adres_woj
 * @property string|null $adres_powiat
 * @property string|null $adres_gmina
 * @property string|null $adres_kod_pocz
 * @property string|null $adres_poczta
 * @property string|null $adres_ulica
 * @property string|null $adres_nr_domu
 * @property string|null $adres_nr_lokalu
 * @property string|null $telefon
 * @property string|null $nip
 * @property string|null $regon
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imie', 'nazwisko', 'adres_kraj', 'adres_woj', 'adres_powiat', 'adres_gmina', 'adres_kod_pocz', 'adres_poczta', 'adres_ulica', 'adres_nr_domu', 'adres_nr_lokalu', 'telefon', 'nip', 'regon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imie' => 'Imie',
            'nazwisko' => 'Nazwisko',
            'adres_kraj' => 'Adres Kraj',
            'adres_woj' => 'Adres Woj',
            'adres_powiat' => 'Adres Powiat',
            'adres_gmina' => 'Adres Gmina',
            'adres_kod_pocz' => 'Adres Kod Pocz',
            'adres_poczta' => 'Adres Poczta',
            'adres_ulica' => 'Adres Ulica',
            'adres_nr_domu' => 'Adres Nr Domu',
            'adres_nr_lokalu' => 'Adres Nr Lokalu',
            'telefon' => 'Telefon',
            'nip' => 'Nip',
            'regon' => 'Regon',
        ];
    }
}
