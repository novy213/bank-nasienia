<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buhaj".
 *
 * @property int $id
 * @property string|null $numer_swiadectwa
 * @property string|null $nazwa_zwiazku_hodowcow1
 * @property string|null $nazwa_ksiegi_hodowlanej2
 * @property string|null $nazwa_rasy_samca_dawcy3
 * @property string|null $numer_samca_dawcy_w_kh5
 * @property string|null $identyfikacyjny_numer_dla_samca_dawcy6
 * @property string|null $system71
 * @property string|null $metoda81
 * @property string|null $indywidualny_numer_indentyfikacjyny72
 * @property string|null $weterynaryjny_numer_indentyfikacjyny73
 * @property string|null $wynik82
 * @property string|null $imie74
 * @property string|null $data_kraj_urodzenia_samca_dawcy9
 * @property string|null $imie_nazwisko_itd_hodowcy10
 * @property string|null $imie_nazwisko_itd_wlasciciela11
 * @property string|null $ojciec121
 * @property string|null $dziadek_ze_strony_ojca1211
 * @property string|null $babka_ze_strony_ojca1212
 * @property string|null $matka122
 * @property string|null $dziadek_ze_strony_matki1221
 * @property string|null $babka_ze_strony_matki1222
 * @property string|null $wyniki_wartosci_uzytkowej131
 * @property string|null $aktualne_wyniki_oceny_genetycznej132
 * @property string|null $wady_genetyczne133
 * @property string|null $indywidualny_numer_identyfikacyjny11
 * @property string|null $weterynaryjny12
 * @property string|null $indywidualny_numer_samca_dawcy13
 * @property string|null $odniesienie_swiadectwa_zootechnicznego14
 * @property string|null $kolor_opakowan
 * @property string|null $kod_opakowan
 * @property string|null $liczba_opakowan
 * @property string|null $miejsce_pobrania_nasienia
 * @property string|null $data_pobrania_nasienia
 * @property string|null $nazwa31
 * @property string|null $adres32
 * @property string|null $numer_zatwierdzenia33
 * @property string|null $miejsce_przezaczenia4
 * @property string|null $sporzadzono_w61
 * @property string|null $w_dniu62
 * @property string|null $imie_nazwisko_osoby_podpisujacej63
 * @property string|null $inne_istotne_informacje
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
            [['numer_swiadectwa', 'nazwa_zwiazku_hodowcow1', 'nazwa_ksiegi_hodowlanej2', 'nazwa_rasy_samca_dawcy3', 'numer_samca_dawcy_w_kh5', 'identyfikacyjny_numer_dla_samca_dawcy6', 'system71', 'metoda81', 'indywidualny_numer_indentyfikacjyny72', 'weterynaryjny_numer_indentyfikacjyny73', 'wynik82', 'imie74', 'data_kraj_urodzenia_samca_dawcy9', 'imie_nazwisko_itd_hodowcy10', 'imie_nazwisko_itd_wlasciciela11', 'ojciec121', 'dziadek_ze_strony_ojca1211', 'babka_ze_strony_ojca1212', 'matka122', 'dziadek_ze_strony_matki1221', 'babka_ze_strony_matki1222', 'wyniki_wartosci_uzytkowej131', 'aktualne_wyniki_oceny_genetycznej132', 'wady_genetyczne133', 'indywidualny_numer_identyfikacyjny11', 'weterynaryjny12', 'indywidualny_numer_samca_dawcy13', 'odniesienie_swiadectwa_zootechnicznego14', 'kolor_opakowan', 'kod_opakowan', 'liczba_opakowan', 'miejsce_pobrania_nasienia', 'data_pobrania_nasienia', 'nazwa31', 'adres32', 'numer_zatwierdzenia33', 'miejsce_przezaczenia4', 'sporzadzono_w61', 'w_dniu62', 'imie_nazwisko_osoby_podpisujacej63', 'inne_istotne_informacje'], 'string'],
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
            'nazwa_zwiazku_hodowcow1' => 'Nazwa Zwiazku Hodowcow1',
            'nazwa_ksiegi_hodowlanej2' => 'Nazwa Ksiegi Hodowlanej2',
            'nazwa_rasy_samca_dawcy3' => 'Nazwa Rasy Samca Dawcy3',
            'numer_samca_dawcy_w_kh5' => 'Numer Samca Dawcy W Kh5',
            'identyfikacyjny_numer_dla_samca_dawcy6' => 'Identyfikacyjny Numer Dla Samca Dawcy6',
            'system71' => 'System71',
            'metoda81' => 'Metoda81',
            'indywidualny_numer_indentyfikacjyny72' => 'Indywidualny Numer Indentyfikacjyny72',
            'weterynaryjny_numer_indentyfikacjyny73' => 'Weterynaryjny Numer Indentyfikacjyny73',
            'wynik82' => 'Wynik82',
            'imie74' => 'Imie74',
            'data_kraj_urodzenia_samca_dawcy9' => 'Data Kraj Urodzenia Samca Dawcy9',
            'imie_nazwisko_itd_hodowcy10' => 'Imie Nazwisko Itd Hodowcy10',
            'imie_nazwisko_itd_wlasciciela11' => 'Imie Nazwisko Itd Wlasciciela11',
            'ojciec121' => 'Ojciec121',
            'dziadek_ze_strony_ojca1211' => 'Dziadek Ze Strony Ojca1211',
            'babka_ze_strony_ojca1212' => 'Babka Ze Strony Ojca1212',
            'matka122' => 'Matka122',
            'dziadek_ze_strony_matki1221' => 'Dziadek Ze Strony Matki1221',
            'babka_ze_strony_matki1222' => 'Babka Ze Strony Matki1222',
            'wyniki_wartosci_uzytkowej131' => 'Wyniki Wartosci Uzytkowej131',
            'aktualne_wyniki_oceny_genetycznej132' => 'Aktualne Wyniki Oceny Genetycznej132',
            'wady_genetyczne133' => 'Wady Genetyczne133',
            'indywidualny_numer_identyfikacyjny11' => 'Indywidualny Numer Identyfikacyjny11',
            'weterynaryjny12' => 'Weterynaryjny12',
            'indywidualny_numer_samca_dawcy13' => 'Indywidualny Numer Samca Dawcy13',
            'odniesienie_swiadectwa_zootechnicznego14' => 'Odniesienie Swiadectwa Zootechnicznego14',
            'kolor_opakowan' => 'Kolor Opakowan',
            'kod_opakowan' => 'Kod Opakowan',
            'liczba_opakowan' => 'Liczba Opakowan',
            'miejsce_pobrania_nasienia' => 'Miejsce Pobrania Nasienia',
            'data_pobrania_nasienia' => 'Data Pobrania Nasienia',
            'nazwa31' => 'Nazwa31',
            'adres32' => 'Adres32',
            'numer_zatwierdzenia33' => 'Numer Zatwierdzenia33',
            'miejsce_przezaczenia4' => 'Miejsce Przezaczenia4',
            'sporzadzono_w61' => 'Sporzadzono W61',
            'w_dniu62' => 'W Dniu62',
            'imie_nazwisko_osoby_podpisujacej63' => 'Imie Nazwisko Osoby Podpisujacej63',
            'inne_istotne_informacje' => 'Inne Istotne Informacje',
        ];
    }
}
