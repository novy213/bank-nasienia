<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buhaj".
 *
 * @property int $id
 * @property string|null $numer_swiadectwa
 * @property string|null $nazwa_zwiazku_hodowcow
 * @property string|null $nazwa_ksiegi_hodowlanej
 * @property string|null $nazwa_rasy_samca_dawcy
 * @property string|null $numer_samca_dawcy_w_kh
 * @property string|null $identyfikacyjny_numer_dla_samca_dawcy
 * @property string|null $system
 * @property string|null $metoda
 * @property string|null $indywidualny_numer_indentyfikacjyny
 * @property string|null $weterynaryjny_numer_indentyfikacjyny
 * @property string|null $wynik
 * @property string|null $imie
 * @property string|null $imie_nazwisko_itd_hodowcy
 * @property string|null $imie_nazwisko_itd_wlasciciela
 * @property string|null $ojciec
 * @property string|null $dziadek_ze_strony_ojca
 * @property string|null $babka_ze_strony_ojca
 * @property string|null $matka
 * @property string|null $dziadek_ze_strony_matki
 * @property string|null $babka_ze_strony_matki
 * @property string|null $wyniki_wartosci_uzytkowej
 * @property string|null $aktualne_wyniki_oceny_genetycznej
 * @property string|null $wady_genetyczne
 * @property string|null $indywidualny_numer_identyfikacyjny
 * @property string|null $weterynaryjny
 * @property string|null $indywidualny_numer_samca_dawcy
 * @property string|null $indywidualny_numer_samca_dawcy_z_gatunkow
 * @property string|null $odniesienie_swiadectwa_zootechnicznego
 * @property string|null $kolor_opakowan
 * @property string|null $liczba_opakowan
 * @property string|null $miejsce_pobrania_nasienia
 * @property string|null $data_pobrania_nasienia
 * @property string|null $nazwa
 * @property string|null $adres
 * @property string|null $numer_zatwierdzenia
 * @property string|null $miejsce_przezaczenia
 * @property string|null $sporzadzono_w
 * @property string|null $w_dniu
 * @property string|null $imie_nazwisko_osoby_podpisujacej
 */
class Buhaj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buhaj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numer_swiadectwa', 'nazwa_zwiazku_hodowcow', 'nazwa_ksiegi_hodowlanej', 'nazwa_rasy_samca_dawcy', 'numer_samca_dawcy_w_kh', 'identyfikacyjny_numer_dla_samca_dawcy', 'system', 'metoda', 'indywidualny_numer_indentyfikacjyny', 'weterynaryjny_numer_indentyfikacjyny', 'wynik', 'imie', 'imie_nazwisko_itd_hodowcy', 'imie_nazwisko_itd_wlasciciela', 'ojciec', 'dziadek_ze_strony_ojca', 'babka_ze_strony_ojca', 'matka', 'dziadek_ze_strony_matki', 'babka_ze_strony_matki', 'wyniki_wartosci_uzytkowej', 'aktualne_wyniki_oceny_genetycznej', 'wady_genetyczne', 'indywidualny_numer_identyfikacyjny', 'weterynaryjny', 'indywidualny_numer_samca_dawcy', 'indywidualny_numer_samca_dawcy_z_gatunkow', 'odniesienie_swiadectwa_zootechnicznego', 'kolor_opakowan', 'liczba_opakowan', 'miejsce_pobrania_nasienia', 'data_pobrania_nasienia', 'nazwa', 'adres', 'numer_zatwierdzenia', 'miejsce_przezaczenia', 'sporzadzono_w', 'w_dniu', 'imie_nazwisko_osoby_podpisujacej'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numer_swiadectwa' => 'Numer Swiadectwa',
            'nazwa_zwiazku_hodowcow' => 'Nazwa Zwiazku Hodowcow',
            'nazwa_ksiegi_hodowlanej' => 'Nazwa Ksiegi Hodowlanej',
            'nazwa_rasy_samca_dawcy' => 'Nazwa Rasy Samca Dawcy',
            'numer_samca_dawcy_w_kh' => 'Numer Samca Dawcy W Kh',
            'identyfikacyjny_numer_dla_samca_dawcy' => 'Identyfikacyjny Numer Dla Samca Dawcy',
            'system' => 'System',
            'metoda' => 'Metoda',
            'indywidualny_numer_indentyfikacjyny' => 'Indywidualny Numer Indentyfikacjyny',
            'weterynaryjny_numer_indentyfikacjyny' => 'Weterynaryjny Numer Indentyfikacjyny',
            'wynik' => 'Wynik',
            'imie' => 'Imie',
            'imie_nazwisko_itd_hodowcy' => 'Imie Nazwisko Itd Hodowcy',
            'imie_nazwisko_itd_wlasciciela' => 'Imie Nazwisko Itd Wlasciciela',
            'ojciec' => 'Ojciec',
            'dziadek_ze_strony_ojca' => 'Dziadek Ze Strony Ojca',
            'babka_ze_strony_ojca' => 'Babka Ze Strony Ojca',
            'matka' => 'Matka',
            'dziadek_ze_strony_matki' => 'Dziadek Ze Strony Matki',
            'babka_ze_strony_matki' => 'Babka Ze Strony Matki',
            'wyniki_wartosci_uzytkowej' => 'Wyniki Wartosci Uzytkowej',
            'aktualne_wyniki_oceny_genetycznej' => 'Aktualne Wyniki Oceny Genetycznej',
            'wady_genetyczne' => 'Wady Genetyczne',
            'indywidualny_numer_identyfikacyjny' => 'Indywidualny Numer Identyfikacyjny',
            'weterynaryjny' => 'Weterynaryjny',
            'indywidualny_numer_samca_dawcy' => 'Indywidualny Numer Samca Dawcy',
            'indywidualny_numer_samca_dawcy_z_gatunkow' => 'Indywidualny Numer Samca Dawcy Z Gatunkow',
            'odniesienie_swiadectwa_zootechnicznego' => 'Odniesienie Swiadectwa Zootechnicznego',
            'kolor_opakowan' => 'Kolor Opakowan',
            'liczba_opakowan' => 'Liczba Opakowan',
            'miejsce_pobrania_nasienia' => 'Miejsce Pobrania Nasienia',
            'data_pobrania_nasienia' => 'Data Pobrania Nasienia',
            'nazwa' => 'Nazwa',
            'adres' => 'Adres',
            'numer_zatwierdzenia' => 'Numer Zatwierdzenia',
            'miejsce_przezaczenia' => 'Miejsce Przezaczenia',
            'sporzadzono_w' => 'Sporzadzono W',
            'w_dniu' => 'W Dniu',
            'imie_nazwisko_osoby_podpisujacej' => 'Imie Nazwisko Osoby Podpisujacej',
        ];
    }
}
