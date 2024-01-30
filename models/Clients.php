<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string|null $imie
 * @property string|null $nazwisko
 * @property string|null $nazwa_skrocona
 * @property string|null $miejscowosc
 * @property string|null $kod_pocztowy
 * @property string|null $poczta
 * @property string|null $ulica
 * @property string|null $nr_domu
 * @property string|null $nr_lokalu
 * @property string|null $telefon
 * @property string|null $nip
 * @property string|null $email
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
            [['imie', 'nazwisko', 'nazwa_skrocona', 'miejscowosc', 'kod_pocztowy', 'poczta', 'ulica', 'nr_domu', 'nr_lokalu', 'telefon', 'nip', 'email'], 'string', 'max' => 255],
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
            'nazwa_skrocona' => 'Nazwa Skrocona',
            'miejscowosc' => 'Miejscowosc',
            'kod_pocztowy' => 'Kod Pocztowy',
            'poczta' => 'Poczta',
            'ulica' => 'Ulica',
            'nr_domu' => 'Nr Domu',
            'nr_lokalu' => 'Nr Lokalu',
            'telefon' => 'Telefon',
            'nip' => 'Nip',
            'email' => 'Email',
        ];
    }
}
